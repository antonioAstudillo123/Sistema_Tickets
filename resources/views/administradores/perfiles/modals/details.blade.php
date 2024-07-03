<div class="modal fade" id="detailModalRole" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="">Permisos</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" x-data="permisosModule">

            <div class="d-flex justify-content-center">
                <div x-show="!open" class="spinner-border text-primary"  style="width: 6rem; height: 6rem;" role="status"></div>
            </div>

            <form x-show="open">
                <div class="row g-2">
                    <div class="col-10">
                        <input x-model="perfil" type="text" class="form-control" placeholder="Ingresa el permiso que deseas agregar">
                    </div>
                    <div x-show="btnSpinner" class="col-2">
                        <button type="button" x-on:click="createPermission()" class="btn btn-dark mb-3">Crear permiso</button>
                    </div>

                    <div x-show="!btnSpinner" class="col-2">
                        <button  class="btn btn-dark mb-3" type="button" disabled>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span class="visually-hidden">Creando...</span>
                        </button>
                    </div>
                </div>

                <div class="card shadow p-3">
                    <div class="card-header">
                        Listado de permisos
                    </div>
                    <div class="card-body">

                        <div class="d-flex justify-content-center">
                            <div x-show="!spinnerDetail"  class="spinner-border text-light"  style="width: 3rem; height: 3rem;" role="status">
                            </div>
                        </div>


                        <div x-show="spinnerDetail"  class="row">
                            <template x-for="permiso in data">
                                <div class="col-4">
                                    <div class="form-check form-check-inline">
                                        <input  class="form-check-input" type="checkbox" :id="permiso.guard_name + permiso.id" :value="permiso.name">
                                        <label x-text="permiso.name" class="form-check-label" for="inlineCheckbox1"></label>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button"  class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" x-on:click="updatePermisos()" class="btn btn-primary">Actualizar permisos</button>
        </div>
      </div>
    </div>
  </div>
