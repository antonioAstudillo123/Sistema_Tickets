@assets
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
@endassets

<div>
    <div x-data="equipos" class="p-3">

        <div class="d-flex justify-content-between mb-3">
            <button x-on:click="abrirModalAdd" class="btn btn-success">Agregar</button>
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
                                    <button x-on:click="detalle(event)" value="{{ $equipo->id }}" data-bs-toggle="modal" data-bs-target="#detalleModal">Detalle</button>
                                    <button>Editar</button>
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
                .catch(function (error) {
                    console.log(error);
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

                    console.log(data);

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





    document.getElementById('liInventario').classList.add('menu-is-opening', 'menu-open');
</script>

@endscript
