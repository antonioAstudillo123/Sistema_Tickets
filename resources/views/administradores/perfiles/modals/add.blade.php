<div class="modal fade" id="addModalRole" tabindex="-1" role="dialog" aria-labelledby="addPerfilModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPerfilModal">Crear un nuevo perfil</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form>
                <div class="form-group">
                  <label for="perfilInput">Perfil</label>
                  <input x-model="inputRole" type="text" class="form-control" id="perfilInput" aria-describedby="emailHelp" placeholder="Ingresa el perfil">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" x-on:click="$wire.create(inputRole)" class="btn btn-primary">Crear perfil</button>
        </div>
      </div>
    </div>
  </div>
