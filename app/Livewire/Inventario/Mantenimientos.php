<?php

namespace App\Livewire\Inventario;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Validate;
use App\Services\Inventario\EquipoService;
use App\Services\Inventario\MantenimientoService;

class Mantenimientos extends Component
{
    use WithPagination;
    public $equipos;

    #[Validate('required', message: 'La fecha del mantenimiento es obligatoria')]
    #[Validate('date', message: 'La fecha del mantenimiento debe ser un dato de tipo fecha')]
    public $fecha;

    #[Validate('required', message: 'El tipo del mantenimiento es obligatorio')]
    #[Validate('string', message: 'El tipo del mantenimiento es un dato incorrecto')]
    public $tipo;

    #[Validate('required', message: 'Debes de seleccionar que usuario va a realizar el mantenimiento')]
    #[Validate('integer', message: 'El usario no es un dato incorrecto')]
    public $user_id;


    #[Validate('required', message: 'Debes de seleccionar el equipo al que se le va a realizar el mantenimiento')]
    #[Validate('integer', message: 'El equipo no es un dato correcto')]
    public $equipo;

    #[Validate('required', message: 'Debes especificar una descripción para que la persona encargada de realizar el mantenimiento la use como guía')]
    #[Validate('string', message: 'La descripción no es un dato correcto')]
    public $descripcion;


    public $id;

    private $service;

    public function mount(EquipoService $service){
        $this->equipos = $service->all()->get(); //Obtenemos todos los equipos para poder llenar el selects
        $this->setAttributes();
    }

    public function boot(MantenimientoService $service){
        $this->service = $service;
    }

    public function render()
    {
        $mantenimientos = $this->service->all()->paginate(10);


        return view('livewire.inventario.mantenimientos' , ['mantenimientos' => $mantenimientos]);
    }


    public function create()
    {
        $this->validate();

        try
        {
            $data = array();
            $data['fecha'] = $this->fecha;
            $data['tipo'] = $this->tipo;
            $data['user_id'] = $this->user_id;
            $data['equipo'] = $this->equipo;
            $data['descripcion'] = $this->descripcion;
            $data['equipo'] = $this->equipo;
            $data['user'] = $this->user_id;

            $this->service->create($data);

            $this->setAttributes();

            $this->dispatch('create-mantenimiento');
        }catch(Exception $e){
            $this->dispatch('create-mantenimiento-error', ['message' => 'Error, no pudimos procesar la solicitud. Contacta al equipo de soporte.']);
        }

     }


     public function setAttributes($id = null){
        if($id === null){
            $this->fecha = '';
            $this->tipo = '';
            $this->user_id = '';
            $this->equipo = '';
            $this->descripcion = '';
        }else{
            $mantenimiento = $this->service->getMantenimiento($id);
            $this->fecha = $mantenimiento->fecha_mantenimiento;
            $this->tipo = $mantenimiento->tipo_mantenimiento;
            $this->user_id = $mantenimiento->id_user;
            $this->equipo = $mantenimiento->id_equipo;
            $this->descripcion = $mantenimiento->descripcion;
            $this->id = $mantenimiento->id;
        }

     }

     public function update()
     {

        try{
            $this->validate();
            $data = array();
            $data['fecha'] = $this->fecha;
            $data['tipo'] = $this->tipo;
            $data['user_id'] = $this->user_id;
            $data['equipo'] = $this->equipo;
            $data['descripcion'] = $this->descripcion;
            $data['equipo'] = $this->equipo;
            $data['user'] = $this->user_id;
            $data['id'] = $this->id;

            $this->service->update($data);

            $this->dispatch('update-mantenimiento');
        }catch(Exception $e){
            $this->dispatch('update-mantenimiento-error' , ['message' => $e->getMessage()]);
        }

     }


     public function delete($id){
        $this->service->delete($id);
     }
}
