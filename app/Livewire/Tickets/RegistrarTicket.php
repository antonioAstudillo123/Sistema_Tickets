<?php

namespace App\Livewire\Tickets;

use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Services\Tickets\RegistrarTicket as RegistrarTicketService;
use Exception;

class RegistrarTicket extends Component
{
    #[Validate('required', message: 'El título es obligatorio')]
    #[Validate('string', message: 'El título debe ser una cadena')]
    #[Validate('max:255', message: 'El título no puede ser mayor a 255 caracteres')]
    public $title;

    #[Validate('required', message: 'La descripción es obligatorio')]
    #[Validate('string', message: 'La descripción debe ser una cadena')]
    #[Validate('max:255', message: 'La descripción no puede ser mayor a 500 caracteres')]
    public $description;


    private $servicio;


    public function boot(RegistrarTicketService $service)
    {
        $this->servicio = $service;
    }

    public function render()
    {
        return view('livewire.tickets.registrar-ticket');
    }



    public function save()
    {
        $this->validate();

        $data = [];

        try{

            $this->servicio->save($this->title , $this->description);
            $this->clearAttibutes();
            $data = $this->setResult('Buen trabajo!' , 'El reporte fue creado exitosamente!' , 'success');

        }catch(Exception $e){

            $data = $this->setResult('Problema 001!' , 'Tuvimos problemas al generar el reporte. Contacta a soporte!' , 'error');
        }

        $this->dispatch('ticket-created' , ['data' => $data]);
    }


    private function clearAttibutes(){
        $this->title = '';
        $this->description = '';
    }


    private function setResult($title , $text , $icon)
    {
        $data = [];

        $data['icon'] = $icon;
        $data['title'] = $title;
        $data['text'] = $text;

        return $data;
    }
}
