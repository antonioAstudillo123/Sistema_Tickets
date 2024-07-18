<div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalle del Mantenimiento</h5>
            </div>
            <div class="modal-body">
                <div  class="d-flex justify-content-center">
                    <div x-show="spinnerDetalle" class="spinner-border" role="status"> </div>
                </div>


                <div x-show="!spinnerDetalle">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="comentariosTicket" class="form-label">Descripción</label>
                                <textarea x-model="descripcion" readonly class="form-control" id="comentariosTicket" rows="4" style="resize: none;" placeholder="No existe una descripción"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="comentariosTicket" class="form-label">Observaciones</label>
                                <textarea x-model="observaciones" readonly class="form-control" id="comentariosTicket" rows="4" style="resize: none;" placeholder="No existen observaciones"></textarea>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
  </div>
