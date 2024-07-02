<div class="modal fade" id="editModalRole" tabindex="-1" role="dialog" aria-labelledby="editPerfilModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editPerfilModal">Editar un perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

            <div class="d-flex justify-content-center">
                <div x-show="openSpinnerEdit" class="spinner-border text-primary"  style="width: 6rem; height: 6rem;" role="status"></div>
            </div>

            <form x-show="!openSpinnerEdit">
                <div class="form-group">
                  <label for="perfilInput">Perfil</label>
                  <input x-model="perfil" type="text" class="form-control" id="perfilInput" aria-describedby="emailHelp" placeholder="Ingresa el perfil">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" x-on:click="$wire.update(id , perfil)" class="btn btn-primary">Actualizar perfil</button>
        </div>
      </div>
    </div>
  </div>
