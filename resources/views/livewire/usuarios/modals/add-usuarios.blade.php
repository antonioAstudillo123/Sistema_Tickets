
  <!-- Modal -->
  <div  x-data="addUser"  class="modal fade shadow" id="modalAddUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar usuario al sistema</h5>
        </div>
        <div class="modal-body">
            <fieldset class="p-1">
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" >Nombre completo</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-font"></i></div>
                            <input x-model="nombre" type="text" class="form-control"  placeholder="Ingresa el nombre">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label">Email</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-envelope-open"></i></div>
                            <input  x-model="email" type="text" class="form-control"  placeholder="Ingresa el email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label">Password</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-lock"></i></div>
                            <input x-model="password" value="" type="password" class="form-control"  placeholder="Ingresa el password">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" >Phone</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-phone"></i></div>
                            <input x-model="phone" type="text" class="form-control" placeholder="Ingresa el teléfono">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label class="visually-hidden form-label" for="sexo">Sexo</label>
                        <div class="input-group">
                            <div class="input-group-text"><i class="fas fa-venus-double"></i></div>
                            <select x-model="sexo"  class="form-control" name="">
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

                <div class="row">
                    <div class="col-12 mb-3">
                        <x-select.perfiles />
                    </div>
                </div>
            </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button x-on:click="createUser()" type="button" class="btn btn-primary">Crear usuario</button>
        </div>
      </div>
    </div>
  </div>
