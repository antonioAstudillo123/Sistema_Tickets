<div>
    <div class=" p-3" x-data="bodyTable">
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
                        @foreach ($usuarios as $usuario )
                            <tr>
                                <th scope="row">{{ $usuario->id }}</th>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->phone }}</td>
                                <td>{{ $usuario->departamento->departamento }}</td>
                                <td>
                                    <button class="btn btn-info">
                                        <i class="fas fa-users-cog"></i>
                                    </button>
                                    <button @click="getDataUser(event)" value="{{ $usuario->id }}" class="btn btn-warning fas fa-edit font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalEditUser"></button>
                                    <button x-on:click="$wire.deleteUser({{ $usuario->id }})"  class="btn btn-danger fas fa-trash-alt"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>

            <div class="card-footer">
                {{ $usuarios->links() }}
            </div>

        </div>

        @include('livewire.usuarios.modals.editar-usuarios')

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
                            this.modalEdit = false;
                            const data = result.data;
                            const departamento = data.departamento;
                            this.nameUser = data.name;
                            this.phone = data.phone;
                            this.email = data.email;
                            this.departamento = departamento.id;
                            this.sexo = data.sexo;
                        } );

                }
            }));


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






    </script>
@endscript
