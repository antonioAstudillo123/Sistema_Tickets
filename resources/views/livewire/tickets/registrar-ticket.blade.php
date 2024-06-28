<div>
    <div class="container p-3">
        <div class="card">
            <div class="card-header">
                Registro de Nueva Incidencia
            </div>
            <div class="card-body">
                <form wire:submit="save">
                    <div class="form-group">
                      <label for="titleTicket">Título</label>
                      <input type="text" class="form-control" id="titleTicket" wire:model ='title' placeholder="Ingresa un título descriptivo sobre la incidencia ">
                      <div> <small class="form-text text-danger"> @error('title') {{ $message }} @enderror</small> </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description" wire:model ='description'   rows="3" placeholder="Describe la incidencia"></textarea>
                        <div> <small class="form-text  text-danger"> @error('description') {{ $message }} @enderror</small> </div>
                    </div>
                    <button  type="submit" class="btn btn-primary">Crear incidencia</button>
                </form>
            </div>
        </div>
    </div>
</div>


@assets

<style>
    textarea{
        resize: none;
    }
</style>
@endassets

@script
<script>
    $wire.on('ticket-created', (result) => {

        let data = result[0].data;

        Swal.fire({
            title: data.title,
            text: data.text,
            icon: data.icon
        });
    });
</script>
@endscript
