<?php

namespace App\Repositories\Tickets;

use App\Models\Tickets\TicketModel;

class TicketRepository{



    public function save(string $title , string $description , int $idUser)
    {
        $ticket = new TicketModel;

        $ticket->title = $title;
        $ticket->description = $description;
        $ticket->user_id = $idUser;

        return $ticket->save();

    }
}
