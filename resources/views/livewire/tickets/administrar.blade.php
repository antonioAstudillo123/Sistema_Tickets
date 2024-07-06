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
                <table class="table table-hover">
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
                        @foreach ($tickets as $ticket )
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ ($ticket->assignedUser) ? $ticket->assignedUser->name : 'Sin asignar' }}</td>
                                @switch($ticket->priority)
                                    @case('Alta')
                                        <td class="bg-danger font-weight-bold shadow">{{ $ticket->priority }}</td>
                                    @break
                                    @case('Media')
                                        <td class="bg-warning font-weight-bold shadow">{{ $ticket->priority }}</td>
                                    @break
                                    @case('Baja')
                                        <td class="bg-primary font-weight-bold shadow">{{ $ticket->priority }}</td>
                                    @break
                                    @default
                                        <td class="bg-secondary font-weight-bold shadow">Sin evaluar</td>
                                @endswitch
                                <td>{{ $ticket->estatus }}</td>
                                <td>{{  \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y - H:i:s') }}</td>
                                <td>
                                    <button value="{{ $ticket->id }}"  x-on:click="getDetalle('{{ $ticket->description }}', '{{ $ticket->comentarios }}')" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modalDetalle">Detalle</button>
                                    <button value="{{ $ticket->id }}" x-on:click="setIdTicket(event)" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAsignar">Asignar</button>
                                    <button class="btn btn-success">Cambiar estatus</button>
                                    <button class="btn btn-danger">Reporte</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{ $tickets->links() }}
            </div>
        </div>

        @include('livewire.tickets.modals.detalle')
        @include('livewire.tickets.modals.asignar')
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

        toggle() {
            this.open = ! this.open
        },
        getDetalle(description , comentarios){
            this.description = description;
            this.spinnerDetalle = false;
            this.comentarios = comentarios;
            // axios.post('/tickets/getDetalleTicket', {
            //     firstName: 'Fred',
            //     lastName: 'Flintstone',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-Requested-With': 'XMLHttpRequest',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //     },
            // })
            // .then(function (response) {
            //     console.log(response);
            // })
            // .catch(function (error) {
            //     console.log(error);
            // });
        },
        setIdTicket(e){
            this.id_ticket = e.target.value;
        }
    }));


    Livewire.on('ticket-assigned', (event) => {
        Swal.fire({
            title: "Good job!",
            text: "You clicked the button!",
            icon: "success"
            }).then(function(){
                window.location.reload();
            });
       });

</script>


@endscript
