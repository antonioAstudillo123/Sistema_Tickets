<div>
    <div class="p-3">
        <div class="card">
            <div class="card-header">
                Solicitudes de incidencias
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Estatus</th>
                        <th scope="col">Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <th>{{ $ticket->id }}</th>
                                <td>{{ $ticket->title }}</td>
                                <td>{{ $ticket->estatus }}</td>
                                <td>{{ \Carbon\Carbon::parse($ticket->created_at)->format('d/m/Y - H:i:s') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
                {{ $tickets->links() }}
            </div>
        </div>
    </div>
</div>
