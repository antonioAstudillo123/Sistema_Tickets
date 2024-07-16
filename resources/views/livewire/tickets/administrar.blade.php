@assets

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <style>
        textarea{
            resize: none;
        }
    </style>
@endassets

<div>
    <div x-data="main" class="p-3">

        @include('livewire.tickets.layouts.menuFilter')

        <div class="card">
            <div class="card-header">
                <h5>Listado de reportes</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead class="text-center">
                        <tr>
                            <th>#</th>
                            <th>Titulo</th>
                            <th>Empleado</th>
                            <th>Asignado</th>
                            <th>Prioridad</th>
                            <th>Estatus</th>
                            <th>Fecha</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">

                        @if(count($tickets) === 0)
                        <tr>
                            <td colspan="8">No hay tickets que mostrar</td>
                        </tr>
                        @else
                        @foreach ($tickets as $ticket )
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ ($ticket->assignedUser) ? $ticket->assignedUser->name : 'Sin asignar' }}</td>
                                @switch($ticket->priority)
                                    @case('Alta')
                                        <td class="">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    @break
                                    @case('Media')
                                        <td class="">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-warning" role="progressbar" style="width: 50%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    @break
                                    @case('Baja')
                                        <td class="">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-primary" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                    @break
                                    @default
                                        <td class="">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped bg-link" role="progressbar" style="width: 0%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </td>
                                @endswitch

                                @switch($ticket->estatus)
                                    @case('Abierto')
                                        <td class="">
                                            <button class="btn btn-primary font-weight-bold shadow rounded-pill">{{ $ticket->estatus }}</button>
                                        </td>
                                    @break
                                    @case('En progreso')
                                        <td class="">
                                            <button class="btn btn-warning font-weight-bold shadow rounded-pill">{{ $ticket->estatus }}</button>
                                        </td>
                                    @break
                                    @case('Resuelto')
                                        <td class="">
                                            <button class="btn btn-success font-weight-bold shadow rounded-pill">{{ $ticket->estatus }}</button>
                                        </td>
                                    @break
                                    @default
                                        <td class="">
                                            <button class="btn btn-danger font-weight-bold shadow rounded-pill">Cancelado</button>
                                        </td>
                                @endswitch
                                <td>{{  \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y - H:i:s') }}</td>
                                <td>
                                    <button value="{{ $ticket->id }}"  x-on:click="getDetalle('{{ $ticket->description }}', '{{ $ticket->comentarios }}')" class="btn btn-info fas fa-eye font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalDetalle" data-bs-toggle="tooltip" data-bs-placement="top" title="Visualizar detalle de incidencia"></button>
                                    <button value="{{ $ticket->id }}" x-on:click="setIdTicket(event , '{{ $ticket->priority }}')" class="btn btn-primary fas fa-link font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalAsignar" data-bs-toggle="tooltip" data-bs-placement="top" title="Asignar reporte a usuario de soporte"></button>

                                    @if($ticket->estatus === 'Resuelto' or $ticket->estatus === 'Cancelado')
                                        <button disabled class="btn btn-success fas fa-exchange-alt font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalEstatusChange"   data-bs-toggle="tooltip" data-bs-placement="top" title="Cambiar estatus de reporte"></button>
                                    @else
                                        <button value="{{ $ticket->id }}" x-on:click="setEstatusAtributos(event)" class="btn btn-success fas fa-exchange-alt font-weight-bold" data-bs-toggle="modal" data-bs-target="#modalEstatusChange"   data-bs-toggle="tooltip" data-bs-placement="top" title="Cambiar estatus de reporte"></button>
                                    @endif
                                    <a target="_blank" href="{{ route('tickets.pdf' , ['id' =>  $ticket->id ]) }}" class="btn btn-danger fas fa-file-pdf" data-bs-toggle="tooltip" data-bs-placement="top" title="Generar reporte en PDF"></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif


                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $tickets->links() }}
            </div>
        </div>

        @include('livewire.tickets.modals.detalle')
        @include('livewire.tickets.modals.asignar')
        @include('livewire.tickets.modals.cambiarEstatus')
    </div>
</div>


@script

<script>
    Alpine.data('main', () => ({
        open: false,
        spinnerDetalle:true,
        description:'',
        comentarios:'',
        user_id:'',
        prioridad: '',
        id_ticket: '',
        boolAsignar:false, //Esta variable la vamos a usar para poder esconder o mostrar los selects encargados de elegir un usuario para asignar un ticke
        estatusTicket:'',

        toggle() {
            this.open = ! this.open
        },
        getDetalle(description , comentarios){
            this.description = description;
            this.spinnerDetalle = false;
            this.comentarios = comentarios;
        },
        setIdTicket(e , prioridad){
            this.boolAsignar = (prioridad === 'Sin evaluar') ? true : false;
            this.id_ticket = e.target.value;
            this.user_id = '';
            this.prioridad = '';
        },
        setEstatusAtributos(e){
            this.estatusTicket = '';
            this.comentarios = '';
            this.id_ticket = e.target.value;
        },
        cambiarEstatus()
        {

            if(this.id_ticket === ''){
                this.messageAlert('Advertencia' , 'No existe un id para ese ticket' ,'warning');
            }else if(this.comentarios === ''){
                this.messageAlert('Advertencia' , 'Debe ingresar un comentario descriptivo acerca de la operación que está realizando' ,'warning');
            }else if(this.estatusTicket === ''){
                this.messageAlert('Advertencia' , 'Debe seleccionar un estatus' ,'warning');
            }else{
                axios.post('/tickets/updateEstatus', {
                    id: this.id_ticket,
                    estatus: this.estatusTicket,
                    comentarios: this.comentarios,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(function (response) {
                    Swal.fire({
                    title: 'Buen trabajo!',
                    text: 'El estatus fue actualizado',
                    icon: 'success'
                    }).then(function(){
                        window.location.reload();
                    });
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        },
        messageAlert(title , text , icon){
                return Swal.fire({
                title: title,
                text: text,
                icon: icon
                });
        }
    }));


    Livewire.on('ticket-assigned', (event) => {
        $('#modalAsignar').modal('hide');

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
                    icon: 'success',
                    title: 'El reporte fue asignado correctamente'
                });


        // Swal.fire({
        //     title: "Buen trabajo!",
        //     text: "El Reporte fue asignado correctamente",
        //     icon: "success"
        //     }).then(function(){
        //         $('#modalAsignar').modal('hide');
        //     });
       });

</script>


@endscript
