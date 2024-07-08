
  <!-- Modal -->
  <div class="modal fade" id="modalAsignar" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Asignar el reporte</h5>
        </div>
        <div class="modal-body">
            <div x-show='boolAsignar' class="container">
                <div class="mb-3">
                    <x-select.usuarios-sistemas />
                </div>
                <div class="mb-3">
                    <x-select.prioridad />
                </div>
            </div>

            <div x-show="!boolAsignar" class="container">
                <div   class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-triangle mr-2"></i>
                    <div>
                     Este ticket ya fue asignado!!!
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button x-on:click="$wire.asignar(id_ticket , user_id , prioridad)" x-bind:disabled="!boolAsignar" type="button" class="btn btn-primary">Asignar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
