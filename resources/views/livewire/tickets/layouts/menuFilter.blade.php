
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
                    <select class="form-control" aria-label="Default select example">
                        <option disabled selected>-- Elige una opción --</option>
                        <option value="1">Baja</option>
                        <option value="2">Media</option>
                        <option value="3">Alta</option>
                      </select>
                </div>
                <div class="col-12 col-lg-6">
                    <label for="exampleDataList" class="form-label">Estatus</label>
                    <select class="form-control" aria-label="Default select example">
                        <option disabled selected>-- Elige una opción --</option>
                        <option value="1">Abierto</option>
                        <option value="2">En progreso</option>
                        <option value="3">Resuelto</option>
                        <option value="4">Cancelado</option>
                      </select>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-end">
                <button class="btn btn-link far fa-check-circle font-weight-bold border mr-1" ></button>
                <button class="btn btn-light fas fa-sync font-weight-bold border"></button>
            </div>
        </div>
    </div>
</div>
