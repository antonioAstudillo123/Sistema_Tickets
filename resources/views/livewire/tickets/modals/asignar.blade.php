
  <!-- Modal -->
  <div class="modal fade" id="modalAsignar" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar el reporte</h5>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="mb-3">
                    <x-select.usuarios-sistemas />
                </div>
                <div class="mb-3">
                    <x-select.prioridad />
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button x-on:click="$wire.asignar(id_ticket , user_id , prioridad)" type="button" class="btn btn-primary">Asignar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
