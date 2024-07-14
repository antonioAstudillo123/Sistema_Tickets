<div wire:ignore id="editModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Editar información de un equipo</h5>
        </div>
        <div class="modal-body p-4">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="serialNumber" class="form-label">Número serial</label>
                        <input wire:model="serial_number" type="text" class="form-control" id="serialNumber" placeholder="Ingresa el número de serial">
                        <input type="hidden" wire:modal="idEquipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input wire:model="marca"  type="text" class="form-control" id="marca" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <input wire:model="modelo"  type="text" class="form-control" id="modelo" placeholder="Ingresa el modelo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="procesador" class="form-label">Procesador</label>
                        <input wire:model="procesador"  type="email" class="form-control" id="procesador" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="ram" class="form-label">RAM</label>
                        <select wire:model="ram"  id="ram" class="form-control">
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
                        <input wire:model="almacenamiento"  type="text" class="form-control" id="almacenamiento" placeholder="Ingresa el tipo de almacenamiento del equipo">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="so" class="form-label">Sistema operativo</label>
                        <input wire:model="sistema_operativo"  type="text" class="form-control" id="so" placeholder="Ingresa el sistema operativo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="fechaCompra" class="form-label">Fecha compra</label>
                        <input wire:model="fecha_compra"  type="date" class="form-control" id="fechaCompra" placeholder="Ingresa la marca del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="fechaGarantia" class="form-label">Fecha garantía</label>
                        <input wire:model="fecha_garantia"  type="date" class="form-control" id="fechaGarantia" placeholder="Ingresa el sistema operativo del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="mac" class="form-label">MAC</label>
                        <input wire:model="mac" type="text" class="form-control" id="mac" placeholder="Ingresa la MAC del equipo">
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label for="ipEquipo" class="form-label">IP del equipo</label>
                        <input wire:model="ip"  type="text" class="form-control" id="ipEquipo" placeholder="Ingresa la IP del equipo">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-3">
                        <label  class="form-label">Estatus</label>
                        <select wire:model="estatus" class="form-control">
                            <option value="En uso" >En uso</option>
                            <option value="En Mantenimiento" >En Mantenimiento</option>
                            <option value="Dañado" >Dañado</option>
                            <option value="En Almacén" >En Almacén</option>
                            <option value="Activo" >Activo</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="mb-3">
                        <x-select.usuarios />
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Notas</label>
                        <textarea wire:model="notas"class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;" placeholder="Ingresa alguna nota (opcional)"></textarea>
                    </div>
                </div>
            </div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button wire:click="update" type="button" class="btn btn-primary">Actualizar información</button>
        </div>
      </div>
    </div>
  </div>
