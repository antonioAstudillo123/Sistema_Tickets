@assets

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

@endassets


<div>
    <div x-data="data">
        <div  class="p-3">

            <div class="d-flex justify-content-between mb-3">
                <button id="addMantenimiento" wire:click="setAttributes"   class="btn btn-success fas fa-plus font-weight-bold "></button>
            </div>

            <div class="card">
                <div class="card-header">
                    Listado de mantenimientos
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Fecha de mantenimiento</th>
                            <th>Tipo de mantenimiento</th>
                            <th>Equipo</th>
                            <th>Usuario</th>
                            <th>Estatus</th>
                            <th>Opciones</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($mantenimientos as $mantenimiento )
                                <tr>
                                    <td>{{ $mantenimiento->id }}</td>
                                    <td>{{ $mantenimiento->fecha_mantenimiento }}</td>
                                    <td>{{ $mantenimiento->tipo_mantenimiento }}</td>
                                    <td>{{ ($mantenimiento->equipo === null) ? 'SIN DATA' : $mantenimiento->equipo->serial_number }}</td>
                                    <td>{{ ($mantenimiento->user=== null) ? 'SIN DATA' : $mantenimiento->user->name }}</td>
                                    <td>{{ $mantenimiento->estatus }}</td>
                                    <td>
                                        <button x-on:click="getDetalle(event)" value="{{ $mantenimiento->id }}" class="btn btn-info fas fa-eye font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Ver detalle del mantenimiento"></button>


                                        @if ($mantenimiento->estatus === 'Completado')
                                            <button disabled class="btn btn-warning fas fa-edit font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar información del mantenimiento"></button>
                                            <button disabled class="btn btn-success far fa-calendar-check font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Cerrar mantenimiento"></button>
                                            <button disabled class="btn btn-danger fas fa-trash font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar mantenimiento"></button>
                                        @else
                                            <button x-on:click="$wire.setAttributes({{ $mantenimiento->id }})" data-bs-toggle="modal" data-bs-target="#editMantenimientoModal" class="btn btn-warning fas fa-edit font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Modificar información del mantenimiento"></button>
                                            <button x-on:click="abrirModalCompletar(event)" value="{{ $mantenimiento->id }}" class="btn btn-success far fa-calendar-check font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Cerrar mantenimiento"></button>
                                            <button wire:click="delete({{ $mantenimiento->id }})" wire:confirm="¿Seguro que desea eliminar este mantenimiento?" class="btn btn-danger fas fa-trash font-weight-bold" data-bs-toggle="tooltip" data-bs-placement="top" title="Eliminar mantenimiento"></button>
                                        @endif


                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ $mantenimientos->links() }}
                </div>
            </div>
        </div>
        @include('livewire.inventario.modals.mantenimientos.add')
        @include('livewire.inventario.modals.mantenimientos.detalle')
        @include('livewire.inventario.modals.mantenimientos.edit')
        @include('livewire.inventario.modals.mantenimientos.completar')
    </div>
</div>


@script

<script>

    Alpine.data('data', () => ({
            user_id: '',
            observaciones: '',
            descripcion: '',
            spinnerDetalle:true,
            idMantenimiento: '',

            getDetalle(e)
            {
                $('#detalleModal').modal('show');
                //Haremos petición asincrona para obtener el detalle del mantenimiento seleccionado

                axios.post('/inventarios/mantenimientos/getDetalle', {
                    id: e.target.value,
                })
                .then( (response) => {
                    this.spinnerDetalle = false;
                    const data = response.data;
                    this.observaciones = data.observaciones;
                    this.descripcion = data.descripcion;

                })
                .catch(function (error) {
                    console.log(error);
                });
            },
            editMantenimiento(e){
                $('#').modal('show');
            },
            abrirModalCompletar(e){
                //completarMantenimientoModal
                this.idMantenimiento = e.target.value;
                this.observaciones = '';
                //console.log(e.target.value);
                $('#completarMantenimientoModal').modal('show');
            },
            completar()
            {
                if(this.observaciones === ''){
                    Swal.fire({
                        title: 'Error!',
                        text: 'Debe ingresar las observaciones para poder completar el mantenimiento!',
                        icon: 'error'
                    });
                }else{

                    axios.post('/inventarios/mantenimientos/completar', {
                        id: this.idMantenimiento,
                        observaciones: this.observaciones
                    })
                    .then( (response) => {
                        Swal.fire({
                            title: 'Buen trabajo!',
                            text: 'El mantenimiento fue completado exitosamente.',
                            icon: 'success'
                        }).then(function(){
                            window.location.reload();
                        });
                    })
                    .catch(function (error) {
                        alert('No pudimos marcar el mantenimiento como completado');
                    });
                }

            }

    }));


    document.getElementById('addMantenimiento').addEventListener('click' , function(){
        $('#addMantenimientoModal').modal('show');
    })


    Livewire.on('create-mantenimiento', (event) => {
        $('#addMantenimientoModal').modal('hide');
        Swal.fire({
            title: 'Buen trabajo!',
            text: 'El mantenimiento fue registrado exitosamente.',
            icon: 'success'
        });
    });


    Livewire.on('create-mantenimiento-error', (event) => {
        Swal.fire({
            title: 'Error!',
            text: event[0].message,
            icon: 'error'
        });
    });



    Livewire.on('update-mantenimiento', (event) => {
        $('#editMantenimientoModal').modal('hide');
        Swal.fire({
            title: 'Buen trabajo!',
            text: 'El mantenimiento fue actualizado exitosamente.',
            icon: 'success'
        });
    });


    Livewire.on('update-mantenimiento-error', (event) => {
        console.log(event);
        // $('#editMantenimientoModal').modal('hide');
         Swal.fire({
             title: 'Error!',
             text: event[0].message,
             icon: 'error'
         });
    });

    document.getElementById('liInventario').classList.add('menu-is-opening', 'menu-open');
</script>

@endscript
