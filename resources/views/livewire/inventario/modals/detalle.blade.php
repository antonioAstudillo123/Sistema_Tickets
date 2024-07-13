<div class="modal fade" id="detalleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
            <div  class="d-flex justify-content-center">
                <div x-show="spinnerDetalle" class="spinner-border" role="status"> </div>
            </div>

            <div x-show="!spinnerDetalle">

                <h3 id="h3UserDetail" class="profile-username text-center">Usuario</h3>

                <p id="pDepartamentoDetail" class="text-muted text-center">Departamento</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Modelo</b> <a class="float-right" id="modeloTextItem">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>Fecha de compra</b> <a class="float-right" id="fechaCompraTextItem">1,322</a>
                    </li>
                    <li class="list-group-item">
                        <b>IP</b> <a class="float-right" id="IPTextItem">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>MAC</b> <a class="float-right" id="MACTextItem">543</a>
                    </li>
                    <li class="list-group-item">
                        <b>Estatus</b> <a class="float-right" id="estatusTextItem">13,287</a>
                    </li>
                </ul>
            </div>
            <a href="#" class="btn btn-secondary btn-block" data-bs-dismiss="modal"><b>Cerrar</b></a>
        </div>
      </div>
    </div>
  </div>
