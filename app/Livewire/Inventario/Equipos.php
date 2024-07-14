<?php

namespace App\Livewire\Inventario;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Inventario\EquipoService;

class Equipos extends Component
{
    use WithPagination;
    private $service;
    public $query;

    //Atributos del modelo Equipo
    public $serial_number;
    public $marca;
    public $modelo;
    public $procesador;
    public $ram;
    public $almacenamiento;
    public $sistema_operativo;
    public $fecha_compra;
    public $fecha_garantia;
    public $assigned_user;
    public $mac;
    public $ip;
    public $notas;
    public $estatus;
    public $idEquipo;

    public function mount(){
        $this->query = '';
        $this->serial_number = '';
        $this->marca = '';
        $this->modelo = '';
        $this->procesador = '';
        $this->ram = '';
        $this->almacenamiento = '';
        $this->sistema_operativo = '';
        $this->fecha_compra = '';
        $this->fecha_garantia = '';
        $this->assigned_user = '';
        $this->mac = '';
        $this->ip = '';
        $this->notas = '';
        $this->estatus = '';
        $this->idEquipo = '';
    }


    public function updatedQuery(){
        $this->resetPage();
    }

    public function boot(EquipoService $service){
        $this->service = $service;
    }

    public function render()
    {

        if($this->query === ''){
            $equipos = $this->service->all()->paginate(10);
        }else{
            $equipos = $this->service->searchFilterEquipo($this->query)->paginate(10);
        }


        return view('livewire.inventario.equipos', ['equipos' => $equipos]);
    }


    public function setAtributos($idEquipo){
        $equipo = $this->service->getEquipo($idEquipo);

        $this->serial_number = $equipo->serial_number;
        $this->marca = $equipo->marca;
        $this->modelo = $equipo->modelo;
        $this->procesador = $equipo->procesador;
        $this->ram = $equipo->ram;
        $this->almacenamiento = $equipo->almacenamiento;
        $this->sistema_operativo = $equipo->sistema_operativo;
        $this->fecha_compra = $equipo->fecha_compra;
        $this->fecha_garantia = $equipo->fecha_garantia;
        $this->assigned_user = ($equipo->assigned_user === null) ? '' : $equipo->assigned_user ;
        $this->mac = $equipo->mac;
        $this->ip = $equipo->ip;
        $this->notas = $equipo->notas;
        $this->estatus = $equipo->estatus;
        $this->idEquipo = $idEquipo;
    }


    /**
     * Para evitarnos la accion de tener que mandar toda los parametros
     *
     * @return void
     */
    public function update()
    {

        try{
            $equipo = $this->service->getEquipo($this->idEquipo);
            $equipo->serial_number = $this->serial_number;
            $equipo->marca = $this->marca;
            $equipo->modelo = $this->modelo;
            $equipo->procesador = $this->procesador;
            $equipo->ram = $this->ram;
            $equipo->almacenamiento = $this->almacenamiento;
            $equipo->sistema_operativo = $this->sistema_operativo;
            $equipo->fecha_compra = $this->fecha_compra;
            $equipo->fecha_garantia = $this->fecha_garantia;
            $equipo->assigned_user = $this->assigned_user;
            $equipo->mac = $this->mac;
            $equipo->ip = $this->ip;
            $equipo->notas = $this->notas;
            $equipo->estatus = $this->estatus;
            $equipo->save();
            $this->dispatch('equipo-update');

        }catch(Exception $e){
            $this->dispatch('equipo-update-error');
        }
    }


    /**
     * Este método lo usamos para formatear la asignacion del equipo de compu
     */

     public function reasignarEquipo($id){
        $this->service->resetAsignacionEquipo($id);
        $this->dispatch('equipo-asigned-format');
     }
}
