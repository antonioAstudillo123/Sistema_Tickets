<?php

namespace App\Livewire\Tickets;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Tickets\TicketService;
use Codedge\Fpdf\Fpdf\Fpdf;


class Administrar extends Component
{
    use WithPagination;
    private $service;
    public $prioridad;
    public $estatusTicket;



    public function updatedPrioridad(){
        $this->resetPage();
    }


    public function updatedEstatusTicket(){
        $this->resetPage();
    }

    public function boot(TicketService $service){
        $this->service = $service;
    }

    public function mount(){
        $this->prioridad = '';
        $this->estatusTicket = '';
    }

    public function render()
    {
        if($this->prioridad !== "" and $this->estatusTicket !== ""){
            $tickets = $this->service->filterSearch($this->prioridad , $this->estatusTicket)->paginate(10);
        }else{
            $tickets = $this->service->getTicketsWithUser()->paginate(10);
        }


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

    //Este metodo se llama cuando hacen una busqueda
    public function searchFilter(){
        $this->render();
    }

    public function setAtributos(){
        $this->prioridad = "";
        $this->estatusTicket = "";
    }

}
