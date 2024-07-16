@assets
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endassets

<div>
    <div x-data="equipos" class="p-3">

        <div class="row d-flex justify-content-center mb-2">
            <div class="col-12 col-lg-6">
                <div class="input-group rounded">
                    <input wire:model.live.debounce.250ms="query" type="search" class="form-control rounded" placeholder="Ingresa el número serial del equipo..." aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                        <i class="fas fa-search"></i>
                    </span>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mb-3">
            <button x-on:click="abrirModalAdd" class="btn btn-success fas fa-plus font-weight-bold "></button>
        </div>

        <div class="card">
            <div class="card-header">
                Listado de equipos
            </div>
            <div class="card-body">
                <table class="table table-hover table-bordered">
                    <thead>
                      <tr>
                        <th >#</th>
                        <th >Serial Number</th>
                        <th >Marca</th>
                        <th >RAM</th>
                        <th >Almacenamiento</th>
                        <th >Procesador</th>
                        <th >Sistema Operativo</th>
                        <th>Opciones</th>

                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($equipos as $equipo )
                            <tr>
                                <th>{{ $equipo->id }}</th>
                                <td>{{ $equipo->serial_number }}</td>
                                <td>{{ $equipo->marca }}</td>
                                <td>{{ $equipo->ram }}</td>
                                <td>{{ $equipo->almacenamiento }}</td>
                                <td>{{ $equipo->procesador }}</td>
                                <td>{{ $equipo->sistema_operativo }}</td>
                                <td>
                                    <button data-toggle="tooltip" data-placement="top" title="Visualizar detalle del equipo" class="fas fa-eye btn btn-info font-weight-bold" x-on:click="detalle(event)" value="{{ $equipo->id }}" data-bs-toggle="modal" data-bs-target="#detalleModal"></button>
                                    <button data-toggle="tooltip" data-placement="top" title="Editar información del equipo" class="fas fa-edit btn btn-warning font-weight-bold" wire:click="setAtributos({{ $equipo->id }})" data-bs-toggle="modal" data-bs-target="#editModal"></button>
                                    <button wire:click="reasignarEquipo({{ $equipo->id }})" data-toggle="tooltip" data-placement="top" title="Liberar equipo" class="fas fa-window-restore btn btn-primary font-weight-bold"></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
            <div class="card-footer">
                {{ $equipos->links() }}
            </div>
        </div>

        @include('livewire.inventario.modals.add')
        @include('livewire.inventario.modals.detalle')
        @include('livewire.inventario.modals.edit')
    </div>
</div>

@script

<script>
    Alpine.data('equipos', () => ({
            spinnerDetalle:false,
            serial:"",
            marca:"",
            modelo:"",
            procesador:"",
            ram:"",
            almacenamiento:"",
            sistema_operativo:"",
            fecha_compra:"",
            fecha_garantia:"",
            idUser:"",
            mac:"",
            ip:"",
            notas:"",

            abrirModalAdd() {
                $('#addEquipoModal').modal('show');
                document.getElementById('idUser').value = '';
            },
            create(){
                if(this.serial === ''){
                    this.messageAlert('Error' ,'Debe ingresar el número de serial' , 'error');
                }else if(this.procesador === ''){
                    this.messageAlert('Error' ,'Debe ingresar el procesador' , 'error');
                }else if(this.ram === ''){
                    this.messageAlert('Error' ,'Debe ingresar la RAM' , 'error');
                }else if(this.almacenamiento === ''){
                    this.messageAlert('Error' ,'Debe ingresar el almacenamiento del equipo' , 'error');
                }else if(this.mac === ''){
                    this.messageAlert('Error' ,'Debe ingresar la MAC del equipo' , 'error');
                }else if(this.sistema_operativo === ''){
                    this.messageAlert('Error' ,'Debe ingresar el sistema operativo del equipo' , 'error');
                }else{
                    this.peticionCreate();
                }
            },
            messageAlert(title , text , icon)
            {
                return Swal.fire({
                        title: title,
                        text: text,
                        icon: icon
                    });
            },
            peticionCreate()
            {
                axios.post('/inventarios/equipos/create', {
                    serial: this.serial,
                    marca:this.marca,
                    modelo:this.modelo,
                    procesador:this.procesador,
                    ram:this.ram,
                    almacenamiento:this.almacenamiento,
                    sistema_operativo:this.sistema_operativo,
                    fecha_compra:this.fecha_compra,
                    fecha_garantia:this.fecha_garantia,
                    idUser:this.idUser,
                    mac:this.mac,
                    ip:this.ip,
                    notas:this.notas,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(function (response)
                {

                        Swal.fire({
                        title: 'Buen trabajo',
                        text: 'Equipo creado correctamente',
                        icon: 'success'
                    }).then(function(){
                        window.location.reload();
                    });

                })
                .catch(function (error)
                {
                    Swal.fire({
                        title: 'Error',
                        text: error.response.data.message,
                        icon: 'error'
                    });
                });
            },
            detalle(e){
                axios.post('/inventarios/equipos/detalle', {
                    id: e.target.value,
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                })
                .then(function (response)
                {
                    const data = response.data[0];

                    if(data.user === null){
                        document.getElementById('h3UserDetail').textContent = 'No tiene usuario asignado';
                        document.getElementById('pDepartamentoDetail').textContent = 'No tiene usuario asignado';
                    }else{
                        document.getElementById('h3UserDetail').textContent = data.user.name;
                        document.getElementById('pDepartamentoDetail').textContent = data.user.departamento.departamento;
                    }

                    document.getElementById('modeloTextItem').textContent =  (data.modelo !== null) ? data.modelo : 'No tiene modelo';
                    document.getElementById('fechaCompraTextItem').textContent =  (data.fecha_compra !== null) ? data.fecha_compra : 'No tiene fecha de compra';
                    document.getElementById('IPTextItem').textContent = (data.ip !== null) ? data.ip : 'No tiene una IP asignada';
                    document.getElementById('MACTextItem').textContent = (data.mac !== null) ? data.mac : 'No existe registro de la MAC';
                    document.getElementById('estatusTextItem').textContent = data.estatus;
                })
                .catch(function (error) {
                    console.log(error);
                });
            }
        }))


    Livewire.on('equipo-update', (event) => {

            $('#editModal').modal('hide');

            Swal.fire({
                        title: 'Buen trabajo!',
                        text: 'El equipo fue actualizado correctamente.',
                        icon: 'success'
            });
    });


    Livewire.on('equipo-update-error', (event) => {

            Swal.fire({
                        title: 'Error!',
                        text: 'No pudimos procesar tu solicitud, error en el sistema.',
                        icon: 'error'
            });
    });

    Livewire.on('equipo-asigned-format', (event) => {

        Swal.fire({
                    title: 'Buen trabajo!',
                    text: 'El equipo fue liberado.',
                    icon: 'success'
        });
    });


    document.getElementById('liInventario').classList.add('menu-is-opening', 'menu-open');
</script>

@endscript
