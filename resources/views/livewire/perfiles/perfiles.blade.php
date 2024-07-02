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
                                <td colspan="3" class="text-center">
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
                                        <button class="btn btn-info fas fa-info-circle font-weight-bold mr-2"></button>
                                        <button x-on:click="getPerfilData(event)" class="btn btn-warning fas fa-edit font-weight-bold" value="{{ $perfil->id }}" data-toggle="modal" data-target="#editModalRole">Editar</button>
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
    </div>
</div>


@script
    <script>
        Alpine.data('perfilModule', () => ({
            openSpinnerEdit: true,
            perfil:'',
            id:'',
            inputRole:'',


            getPerfilData(e){
                this.openSpinnerEdit = true;
                const data = {
                    id : e.target.value
                }

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

    </script>
@endscript
