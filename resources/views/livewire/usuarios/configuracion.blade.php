<div>
   <div class="container p-3">
        <div class="card shadow">
            <div class="card-header">
                Configuración de cuenta
            </div>
            <div class="card-body">
                <fieldset class="p-1">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="visually-hidden form-label" for="nameUser">Nombre completo</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-font"></i></div>
                                <input wire:model="name" type="text" class="form-control" id="nameUser" placeholder="No tiene nombre">
                            </div>
                            <div class="text-danger">@error('name') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="visually-hidden form-label" for="email">Email</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-envelope-open"></i></div>
                                <input wire:model="email"  type="text" class="form-control" id="email"  placeholder="No tiene email">
                            </div>
                            <div class="text-danger">@error('email') {{ $message }} @enderror</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="visually-hidden form-label" for="password">Password</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                <input wire:model="password" value="" type="password" class="form-control" id="password" placeholder="************">
                            </div>
                            <div class="text-danger">@error('password') {{ $message }} @enderror</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 mb-3">
                            <label class="visually-hidden form-label" for="phone">Phone</label>
                            <div class="input-group">
                                <div class="input-group-text"><i class="fas fa-phone"></i></div>
                                <input wire:model="phone" type="text" class="form-control" id="phone" placeholder="No tiene teléfono">
                            </div>
                            <div class="text-danger">@error('phone') {{ $message }} @enderror</div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div wire:click="update" class="btn btn-primary">Actualizar información</div>
                </div>
            </div>
        </div>
   </div>
</div>


@script


<script>

       //logica encargada de agregar al menu la clase menu-open
       document.getElementById('liUsuarios').classList.add('menu-is-opening', 'menu-open');


       $wire.on('user-update', () => {
            messageAlert('Buen trabajo!', 'Usuario actualizado correctamente.' ,'success').then(() => window.location.reload());
        });


        $wire.on('user-error', () => {
            messageAlert('Error!', 'No pudimos procesar la solicitud.' ,'error');
        });


        function messageAlert(title , text , icon){
            return   Swal.fire({
                    title: title,
                    text: text,
                    icon: icon,
                })
        }


</script>

@endscript
