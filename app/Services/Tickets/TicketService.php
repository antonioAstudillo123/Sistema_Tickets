<?php

namespace App\Services\Tickets;

use Illuminate\Support\Facades\Auth;
use App\Repositories\Tickets\TicketRepository;


class TicketService{

    private $repositorio;


    public function __construct(TicketRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    /*
        Creamos un nuevo ticket en el sistema.
    */
    public function save(string $titulo , string $description)
    {
        return $this->repositorio->save($titulo , $description , Auth::user()->id);
    }


    /**
     * Obtenemos todos los tickets en el sistema
     */

     public function all(){
        return $this->repositorio->all();
     }



    /*
        Obtenemos todos los tickets con su usuario al que le pertenece
    */
    public function getTicketsWithUser()
    {
        return $this->repositorio->getTicketsWithUser();
    }


    /**
     * Asignamos a un usuario del area de sistemas un ticket y le establecemos la prioridad
     */

    public function asignar($id_ticket  , $id_user , $prioridad){
        return $this->repositorio->asignar($id_ticket  , $id_user , $prioridad);
    }


    /*
        Actualizamos el estatus, es importante saber el id del ticket y tener los comentarios
    */
    public function updateEstatus($idTicket , $estatus , $comentarios){
        return $this->repositorio->updateEstatus($idTicket , $estatus , $comentarios);
    }


    /*
        Filtraremos los ticket dependiendo la opción que el usuario eliga
        El filtro se realiza por prioridad y estatus
    */
    public function filterSearch($prioridad , $estatus){
        return $this->repositorio->filterSearch($prioridad , $estatus);
    }


    /*
        Creamos reporte en PDF
    */

    public function createPDF($idTicket){
        return $this->repositorio->getTicketsWithUser($idTicket)->find($idTicket);
    }









}
