<div>
    <div class="p-3" x-data="bodyTable">
        <form action="" wire:submit="search">
            <div class="row d-flex justify-content-center mb-3">
                <div class="col-12 col-lg-6">
                    <div class="input-group rounded">
                        <input wire:model.live.debounce.250ms="query" type="search" class="form-control rounded" placeholder="Buscar usuario..." aria-label="Search" aria-describedby="search-addon" />
                        <span class="input-group-text border-0" id="search-addon">
                          <i class="fas fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </form>

        <div class="mt-2 mb-2">
            <button @click="resetAtributos()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddUser">
                <i class="fas fa-user-plus"></i>
            </button>
        </div>

        <div class="card">
            <div class="card-header">
                <h5>Listado de usuarios</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Department</th>
                        <th>Opciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if(count($usuarios) === 0)
                            <tr>
                                <td colspan="6">
                                    <p class="text-center">No hay registros que mostrar</p>
                                </td>

                            </tr>
                        @else
                            @foreach ($usuarios as $usuario )
                                <tr>
                                    <th scope="row">{{ $usuario->id }}</th>
                                    <td>{{ $usuario->name }}</td>
                                    <td>{{ $usuario->email }}</td>
                                    <td>{{ $usuario->phone }}</td>
                                    <td>{{ $usuario->departamento->departamento }}</td>
                                    <td>
                                        <button @click="getDataUser(event)" value="{{ $usuario->id }}" class="btn btn-warning fas fa-edit font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalEditUser"></button>
                                        <button x-on:click="$wire.deleteUser({{ $usuario->id }})"  class="btn btn-danger fas fa-trash-alt"></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                    </tbody>
                  </table>
            </div>

            <div class="card-footer">
                {{ $usuarios->links() }}
            </div>

        </div>

        @include('livewire.usuarios.modals.editar-usuarios')
        @include('livewire.usuarios.modals.add-usuarios')
    </div>
</div>


@script
    <script>
            Alpine.data('bodyTable', () => ({
                modalEdit: false,
                hideModal:true,
                nameUser:'',
                phone:'',
                email:'',
                departamento:'',
                password:'',
                id:'',
                sexo:'',
                perfil:'',
                getDataUser(e) {
                    this.modalEdit = true;
                    this.id = e.target.value;

                    const data = {
                        id:this.id
                    }

                    fetch('getDataUser' , {
                        method:'POST',
                        headers:{
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data)
                    })
                        .then(response => response.json())
                        .then(result =>{
                            console.log(result);
                            this.modalEdit = false;
                            const data = result.data;
                            const departamento = data.departamento;
                            this.nameUser = data.name;
                            this.phone = data.phone;
                            this.email = data.email;
                            this.departamento = departamento.id;
                            this.sexo = data.sexo;
                            this.perfil = data.roles[0].id;
                    } );
                },
                resetAtributos(){
                    this.perfil = '';
                    this.departamento = '';
                },
            }));


            Alpine.data('addUser', () => ({
                nombre:'',
                email:'',
                phone:'',
                password:'',
                sexo:'',
                createUser()
                {
                    if(this.nombre === ''){
                        this.messageAlert('Error' , 'Debe ingresar un nombre' , 'error');
                    }else if(this.email === ''){
                        this.messageAlert('Error' , 'Debe ingresar un email' , 'error');
                    }else if(this.password === ''){
                        this.messageAlert('Error' , 'Debe ingresar un password' , 'error');
                    }else if(this.phone === ''){
                        this.messageAlert('Error' , 'Debe ingresar un phone' , 'error');
                    }else if(this.sexo === ''){
                        this.messageAlert('Error' , 'Debe seleccionar un sexo' , 'error');
                    }else if(this.departamento === ''){
                        this.messageAlert('Error' , 'Debe seleccionar un departamento' , 'error');
                    }else if(this.perfil === ''){
                        this.messageAlert('Error' , 'Debe seleccionar un perfil' , 'error');
                    }
                    else
                    {
                        const data = {
                            nombre:this.nombre,
                            email:this.email,
                            password:this.password,
                            phone:this.phone,
                            sexo:this.sexo,
                            departamento:this.departamento,
                            perfil:this.perfil
                        }

                        fetch('create' , {
                        method:'POST',
                        headers:{
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: JSON.stringify(data) ,
                         })
                        .then( (response) =>{
                            if(response.status === 500){
                                throw new Error('Exception message');
                            }

                            return response.json();
                        }


                         )
                        .then(result =>{
                            this.messageAlert('Buen trabajo' , 'Usuario creado correctamente' , 'success').then(function(){
                                window.location.reload();
                            })
                        })
                        .catch(function(error){
                            alert('Error en el sistema');
                        });
                    }

                },
                messageAlert(title , text , icon){
                    return Swal.fire({
                        title: title,
                        text: text,
                        icon: icon,
                    });
                }
            }))


            $wire.on('user-update', (event) => {
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
