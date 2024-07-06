
  <!-- Modal -->
<div class="modal fade" id="modalDetalle" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detalle del reporte</h5>
        </div>
        <div class="modal-body">
            <div  class="d-flex justify-content-center">
                <div x-show="spinnerDetalle" class="spinner-border" role="status"></div>
            </div>

            <div x-show="!spinnerDetalle" class="container">
                <div class="mb-3">
                    <label for="descriptionTicket" class="form-label">Descripción reporte</label>
                    <textarea x-model="description" readonly class="form-control" id="descriptionTicket" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="comentariosTicket" class="form-label">Comentarios</label>
                    <textarea x-model="comentarios" readonly class="form-control" id="comentariosTicket" rows="4" placeholder="No existen comentarios"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
