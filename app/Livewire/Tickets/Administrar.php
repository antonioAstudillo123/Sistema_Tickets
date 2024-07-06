<?php

namespace App\Livewire\Tickets;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Tickets\TicketService;


class Administrar extends Component
{
    use WithPagination;
    private $service;

    public function boot(TicketService $service){
        $this->service = $service;
    }

    public function render()
    {
        $tickets = $this->service->getTicketsWithUser()->paginate(10);

        return view('livewire.tickets.administrar')->with('tickets', $tickets);
    }


    /**
     * Metodo utilizado para asignarle a un usuario de sistemas un ticket
     */

     public function asignar($id_ticket , $id_user , $prioridad){
        try{
            $this->service->asignar($id_ticket  , $id_user , $prioridad);
            $this->dispatch('ticket-assigned');
        }catch(Exception $e){

        }
     }
}
