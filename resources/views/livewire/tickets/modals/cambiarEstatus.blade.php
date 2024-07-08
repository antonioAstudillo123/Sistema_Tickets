
  <!-- Modal -->
  <div class="modal fade" id="modalEstatusChange" tabindex="-1"  aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modificar el estatus</h5>
        </div>
        <div class="modal-body">
            <div  class="container">
                <div class="mb-3">
                    <label for="asignar" class="form-label">Estatus</label>
                    <select x-model="estatusTicket" class="form-control" name="" id="asignar">
                        <option disabled selected value="">-- Elige una opción -- </option>
                        <option value="Resuelto">Resuelto</option>
                        <option value="Cancelado">Cancelado</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="comentariosTicket" class="form-label">Comentarios</label>
                    <textarea x-model="comentarios"  class="form-control" id="comentariosTicket" rows="4" placeholder="Ingresa comentarios"></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button  x-on:click="cambiarEstatus()" type="button" class="btn btn-primary">Cambiar estatus</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
