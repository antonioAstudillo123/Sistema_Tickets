<div>
    <div class="p-3" x-data="perfilModule">

        <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addModalRole">
            <i class="fas fa-plus-circle"></i>
        </button>

        <div class="card">
            <div class="card-header">
                <h6>Listado de perfiles</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Perfil</th>
                        <th>Guard</th>
                        <th>Create_at</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>

                        @if(count($perfiles) === 0)
                            <tr>
                                <td colspan="5" class="text-center">
                                    No hay registros que mostrar
                                </td>
                            </tr>

                        @else
                            @foreach ($perfiles as $perfil )
                                <tr>
                                    <td>{{ $perfil->id }}</td>
                                    <td>{{ $perfil->name }}</td>
                                    <td>{{ $perfil->guard_name }}</td>
                                    <td>{{ $perfil->created_at }}</td>
                                    <td>
                                        <button value="{{ $perfil->id }}"  x-on:click="getPermisosRole(event)" class="btn btn-info fas fa-info-circle font-weight-bold mr-2" data-toggle="modal" data-target="#detailModalRole"></button>
                                        <button x-on:click="getPerfilData(event)" class="btn btn-warning fas fa-edit font-weight-bold mr-2" value="{{ $perfil->id }}" data-toggle="modal" data-target="#editModalRole">Editar</button>
                                        <button x-on:click="$wire.delete({{ $perfil->id }})"  class="btn btn-danger fas fa-trash-alt font-weight-bold text-black">Eliminar</button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                    </tbody>
                  </table>
            </div>

            <div class="card-footer">
                {{ $perfiles->links() }}
            </div>

        </div>


        @include('administradores.perfiles.modals.add')
        @include('administradores.perfiles.modals.edit')
        @include('administradores.perfiles.modals.details')
    </div>
</div>


@script
    <script>
        Alpine.data('perfilModule', () => ({
            openSpinnerEdit: true,
            perfil:'',
            id:'',
            inputRole:'',
            data : [],
            permisosData:[],
            spinnerDetail:false,
            getPerfilData(e)
            {
                this.openSpinnerEdit = true;

                const data = {
                    id : e.target.value
                };

                fetch('getData' , {
                        method:'POST',
                        headers:{
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data)
                    })
                        .then(response => response.json())
                        .then(result =>{
                            this.openSpinnerEdit = false;
                            let data = result.data;

                            this.id = data.id;
                            this.perfil = data.name;
                        } );
            },
            getPermisosRole(e)
            {
                this.id = e.target.value;

                //Aqui debemos hacer peticion al servidor para obtener todos los permisos que tiene un determinado perfil
                fetch('getAllPermisos' ,
                {
                    method:'GET',
                    headers:
                    {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then((response)  => {return response.json()})
                .then( (result) =>
                {

                    this.data = result.data;
                    this.spinnerDetail = true;

                    fetch('getPermisosRole' ,
                    {
                        method:'POST',
                        headers:
                        {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body:JSON.stringify({perfil:e.target.value}),
                    })
                    .then((response)  => {return response.json()})
                    .then( (result) =>
                    {
                        this.data.forEach(element => {
                            document.getElementById(element.guard_name + element.id).checked = false;
                        });

                        result.data.forEach(element => {
                            document.getElementById(element.guard_name + element.id).checked = true;
                        });
                    })
                    .catch(function(error){
                        console.log(error);
                        alert('Error al obtener la data')
                    })





                })
                .catch(function(error){
                    alert('Error al obtener la data')
                });

            },
            updatePermisos()
            {
                let tam = this.data.length;

                for (let index = 1; index <= tam; index++) {

                    if(document.getElementById('web'+index).checked)
                    {
                        this.permisosData.push({'id': document.getElementById('web'+index).value});
                    }

                }

                const data = {
                    data:this.permisosData,
                    id:this.id,
                }


                //Hacemos petición al servidor para actualizar los permisos de un perfil
                fetch('update' ,
                    {
                        method:'POST',
                        headers:
                        {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body:JSON.stringify(data),
                    })
                    .then((response)  => {return response.json()})
                    .then( (result) =>
                    {
                        Swal.fire({
                            title: 'Buen trabajo!',
                            text: 'Permisos actualizados correctamente',
                            icon: 'success',
                        }).then(function(){
                            window.location.reload();
                        });
                    })
                    .catch(function(error){
                        alert('Error al obtener la data')
                    })
            }

        }))


        Alpine.data('permisosModule', () => ({
                open:true,
                btnSpinner:true,
                perfil:'',
                createPermission()
                {
                    this.btnSpinner = false;

                    const data = {
                        perfil: this.perfil
                    }

                    fetch('createPermiso' , {
                        method:'POST',
                        headers:{
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data)
                    })
                        .then( (response) => {

                            if(response.status === 500)
                            {
                                this.btnSpinner = true;
                                throw new Error(error.message);
                            }
                        })
                        .then(result =>
                        {
                            this.btnSpinner = true;
                            this.perfil = '';

                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 1500,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });

                                Toast.fire({
                                icon: "success",
                                title: "Permiso creado correctamente"
                                });


                                fetch('getAllPermisos' ,{
                                    method:'GET',
                                    headers:{
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                                    },
                                })
                                .then((response)  => {return response.json()})
                                .then( (result) => {
                                    this.data = result.data;
                                    console.log(this.data);
                                })
                                .catch(function(error){
                                    console.log(error);
                                })


                        }).catch(function(error)
                        {
                            const Toast = Swal.mixin({
                                    toast: true,
                                    position: "top-end",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.onmouseenter = Swal.stopTimer;
                                        toast.onmouseleave = Swal.resumeTimer;
                                    }
                                });

                                Toast.fire({
                                icon: "error",
                                title: "No pudimos crear el permiso"
                                });
                        });

                }
        }))

        $wire.on('role-created', (event) => {

            let result = event[0].data;

            Swal.fire({
                    title: result.title,
                    text: result.text,
                    icon: result.icon,
                }).then(function(){
                    window.location.reload();
                });
        });

        //logica encargada de agregar al menu la clase menu-open
        document.getElementById('liMenuAdmin').classList.add('menu-is-opening', 'menu-open');
        document.getElementById('liConfigUsers').classList.add('menu-is-opening', 'menu-open');

    </script>
@endscript
