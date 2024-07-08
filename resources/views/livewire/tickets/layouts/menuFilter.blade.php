
<button x-on:click="toggle()" :class="open ? 'fa-sort-down' : 'fa-sort-up'" class="btn btn-dark fas font-weight-bold mb-2 btn-sm"></button>

<div x-show="open" class="">
    <div class="card">
        <div class="card-header">
            Filtrar registros
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <label for="exampleDataList" class="form-label">Prioridad</label>
                    <select wire:model="prioridad" name="prioridad" class="form-control" aria-label="Default select example">
                        <option disabled selected value="">-- Elige una opción --</option>
                        <option value="Baja">Baja</option>
                        <option value="Media">Media</option>
                        <option value="Alta">Alta</option>
                        <option value="Sin evaluar">Sin evaluar</option>
                      </select>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="exampleDataList" class="form-label">Estatus</label>
                    <select wire:model="estatusTicket" name="estatus" class="form-control" aria-label="Default select example">
                        <option disabled selected value="">-- Elige una opción --</option>
                        <option value="Abierto">Abierto</option>
                        <option value="En progreso">En progreso</option>
                        <option value="Resuelto">Resuelto</option>
                        <option value="Cancelado">Cancelado</option>
                      </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button wire:click="searchFilter" class="btn btn-link far fa-check-circle font-weight-bold border mr-1" ></button>
                <button wire:click="setAtributos" class="btn btn-light fas fa-sync font-weight-bold border"></button>
            </div>
        </div>
    </div>
</div>
