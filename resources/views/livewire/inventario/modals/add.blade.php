<div id="addEquipoModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Agregar equipo al sistema</h5>
        </div>
        <div class="modal-body p-4">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="serialNumber" class="form-label">Número serial</label>
                        <input x-model="serial" type="text" class="form-control" id="serialNumber" placeholder="Ingresa el número de serial">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input x-model="marca" type="text" class="form-control" id="marca" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input x-model="modelo" type="text" class="form-control" id="modelo" placeholder="Ingresa el modelo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Procesador</label>
                        <input x-model="procesador" type="email" class="form-control" id="marca" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="ram" class="form-label">RAM</label>
                        <select  x-model="ram"  id="ram" class="form-control">
                            <option value="" selected disabled>-- Elige una opción --</option>
                            <option value="8 GB">8 GB</option>
                            <option value="12 GB">12 GB</option>
                            <option value="16 GB">16 GB</option>
                            <option value="32 GB">32 GB</option>
                            <option value="64 GB">64 GB</option>
                            <option value="128 GB">128 GB</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="almacenamiento" class="form-label">Almacenamiento</label>
                        <input x-model="almacenamiento" type="text" class="form-control" id="almacenamiento" placeholder="Ingresa el tipo de almacenamiento del equipo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="so" class="form-label">Sistema operativo</label>
                        <input x-model="sistema_operativo" type="text" class="form-control" id="so" placeholder="Ingresa el sistema operativo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="fechaCompra" class="form-label">Fecha compra</label>
                        <input x-model="fecha_compra"  type="date" class="form-control" id="fechaCompra" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="fechaGarantia" class="form-label">Fecha garantía</label>
                        <input x-model="fecha_garantia" type="date" class="form-control" id="fechaGarantia" placeholder="Ingresa el sistema operativo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="mac" class="form-label">MAC</label>
                        <input x-model="mac" type="text" class="form-control" id="mac" placeholder="Ingresa la MAC del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="ipEquipo" class="form-label">IP del equipo</label>
                        <input x-model="ip" type="text" class="form-control" id="ipEquipo" placeholder="Ingresa la IP del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <x-select.usuarios-sin-equipo />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Notas</label>
                        <textarea x-model="notas" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;" placeholder="Ingresa alguna nota (opcional)"></textarea>
                    </div>
                </div>
            </div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button x-on:click="create" type="button" class="btn btn-primary">Crear equipo</button>
        </div>
      </div>
    </div>
  </div>
