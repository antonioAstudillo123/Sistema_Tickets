
  <!-- Modal -->
  <div x-show="hideModal" class="modal fade shadow" id="modalEditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar información del usuario</h5>
        </div>
        <div  class="modal-body">
            <div class="d-flex justify-content-center">
                <div x-show="modalEdit" class="spinner-border text-primary"  style="width: 6rem; height: 6rem;" role="status"></div>
            </div>

            <fieldset class="p-1" x-show="!modalEdit">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="nameUser">Nombre completo</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-font"></i></div>
                            <input x-model="nameUser" type="text" class="form-control" id="nameUser" placeholder="No tiene nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-envelope-open"></i></div>
                            <input x-model="email" type="text" class="form-control" id="email" placeholder="No tiene email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            <input x-model="password" value="" type="password" class="form-control" id="password" placeholder="************">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="phone">Phone</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            <input x-model="phone" type="text" class="form-control" id="phone" placeholder="No tiene teléfono">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="sexo">Sexo</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-venus-double"></i></div>
                            <select x-model="sexo" class="form-control" name="" id="sexo">
                                <option disabled selected value="">-- Elige una opción -- </option>
                                <option value="M"> Masculino</option>
                                <option  value="F">Femenino </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <x-select.departamentos />
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button x-on:click="$wire.updateUser(id , nameUser, phone, email, departamento, password , sexo)" type="button" class="btn btn-primary">Guardar cambios</button>
        </div>
      </div>
    </div>
  </div>
