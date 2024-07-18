<div class="modal fade" id="completarMantenimientoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar estado del mantenimiento</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label  class="form-label">Observaciones</label>
                            <textarea x-model="observaciones" class="form-control" rows="4" style="resize: none;" placeholder="Ingresa tus observaciones acerca de este mantenimiento"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button x-on:click="completar" type="button" class="btn btn-primary" >Completar</button>
                <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
  </div>
