<?php

namespace App\Services\Tickets;

use App\Repositories\Tickets\TicketRepository;

class RegistrarTicket{

    private $repositorio;


    public function __construct(TicketRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }

    public function save(string $titulo , string $description)
    {
        //Debemos de añadir la logica de obtener el id del usuario que esta generando el ticket

        return $this->repositorio->save($titulo , $description , 1);
    }

}
