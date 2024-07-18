<div wire:ignore.self id="addMantenimientoModal" class="modal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Crear un mantenimiento</h5>
        </div>
        <div class="modal-body p-4">

            <div wire:loading.block>
                <div class="d-flex justify-content-center">
                    <div class="spinner-border" role="status">
                    </div>
                </div>
            </div>


            <div wire:loading.remove.block>
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de mantenimiento</label>
                            <input wire:model="fecha" type="date" class="form-control" id="fecha" >
                            <div> <small class="form-text text-danger"> @error('fecha') {{ $message }} @enderror</small> </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="mb-3">
                            <label  class="form-label">Tipo de mantenimiento</label>
                            <select wire:model="tipo" class="form-control" name="" id="">
                                <option value="" disabled selected>-- Elige una opción --</option>
                                <option value="Preventivo">Preventivo</option>
                                <option value="Correctivo">Correctivo</option>
                            </select>
                            <div> <small class="form-text text-danger"> @error('tipo') {{ $message }} @enderror</small> </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="mb-3">
                           <x-select.usuarios-sistemas />
                           <div> <small class="form-text text-danger"> @error('user_id') {{ $message }} @enderror</small> </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="mb-3">
                            <label class="form-label">Equipo</label>
                            <select wire:model="equipo" class="form-control" name="" id="">
                                <option value="" disabled selected>-- Elige una opción --</option>
                                @foreach ($equipos as $equipo )
                                    <option value="{{ $equipo->id }}">{{ $equipo->serial_number }}</option>
                                @endforeach
                            </select>
                            <div> <small class="form-text text-danger"> @error('equipo') {{ $message }} @enderror</small> </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
                            <textarea wire:model="descripcion" class="form-control" id="exampleFormControlTextarea1" rows="3" style="resize:none;" placeholder="Ingresa una descripción"></textarea>
                            <div> <small class="form-text text-danger"> @error('descripcion') {{ $message }} @enderror</small> </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button wire:click="create" type="button" class="btn btn-primary">Crear mantenimiento</button>
        </div>

      </div>
    </div>
  </div>
