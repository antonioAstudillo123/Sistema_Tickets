<div>
    <div class="container p-3">
        <div class="card">
            <div class="card-header">
                Registro de Nueva Incidencia
            </div>
            <div class="card-body">
                <form wire:submit="save" id="formCreateIncident">
                    <div class="form-group">
                      <label for="titleTicket">Título</label>
                      <input type="text" class="form-control" id="titleTicket"   wire:model ='title' placeholder="Ingresa un título descriptivo sobre la incidencia ">
                      <div> <small class="form-text text-danger"> @error('title') {{ $message }} @enderror</small> </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" id="description"  wire:model ='description'   rows="3" placeholder="Describe la incidencia"></textarea>
                        <div> <small class="form-text  text-danger"> @error('description') {{ $message }} @enderror</small> </div>
                    </div>
                    <button id="btnCrear"  type="submit" class="btn btn-primary">Crear incidencia</button>
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


        document.getElementById('btnCrear').addEventListener('click' , function(e){
            e.preventDefault();

            let title = document.getElementById('titleTicket').value;
            let description = document.getElementById('description').value;

            if(title === '')
            {
                toastMessage('error' , 'Debe ingresar un título!');
            }else if(description === ''){
                toastMessage('error' , 'Debe ingresar una descripción!');
            }else{
                $wire.dispatch('save');
            }

        })


        function toastMessage(icon , title){
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                Toast.fire({
                    icon: icon,
                    title: title
                });
        }

    </script>



@endscript
