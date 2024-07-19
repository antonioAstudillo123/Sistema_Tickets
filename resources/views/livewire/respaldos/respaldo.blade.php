<div>
    <div class="container p-5">
        <div class="card">
            <div class="card-header">
                Respaldar la base de datos del sistema
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-center">
                    <button wire:loading.remove  wire:click="respaldar" class="btn btn-success btn-block">Respaldar</button>
                    <button wire:loading.block class="btn btn-success btn-block" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Respaldando información...
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>


@script
    <script>


        Livewire.on('respaldo-error', (event) => {
            Swal.fire({
                title: 'Ups!',
                text: 'No pudimos realizar el respaldo',
                icon: 'error',
            });

        });


        Livewire.on('respaldo-success', (event) => {
            Swal.fire({
                title: 'Buen trabajo!',
                text: 'El respaldo se hizo correctamente!!',
                icon: 'success',
            });

        });
        //logica encargada de agregar al menu la clase menu-open
        document.getElementById('liMenuAdmin').classList.add('menu-is-opening', 'menu-open');
        document.getElementById('liConfigUsers').classList.add('menu-is-opening', 'menu-open');
    </script>
@endscript
