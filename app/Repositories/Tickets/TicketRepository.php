<?php

namespace App\Repositories\Tickets;

use App\Models\User;
use App\Models\Tickets\TicketModel;

class TicketRepository{

    /*
        Creamos un nuevo ticket en el sistema

        El titulo del reporte
        La descripcion detallada del reporte
        El usuario que levanta dicho ticket
    */

    public function save(string $title , string $description , int $idUser)
    {
        $ticket = new TicketModel;

        $ticket->title = $title;
        $ticket->description = $description;
        $ticket->user_id = $idUser;

        return $ticket->save();

    }


    /**
     *
     * Obtenemos todos los tickets del sistema
     * Retornamos una query para delegar la responsabilidad de paginar o mostrar todo a la clase que mande a llamar a este metodo
    */

    public function all(){
        return TicketModel::query();
    }

    /**
     * Obtenemos todos los tickets con sus respectivo user
     */

     public function getTicketsWithUser(){
        return TicketModel::with(['user' ,'assignedUser']);
     }



       /*
        Le asignamos a un usuario de sistema un ticket y establecemos la prioridad
      */

      public function asignar($id_ticket  , $id_user , $prioridad)
      {
         $user = TicketModel::findOrFail($id_ticket);
         $user->priority = $prioridad;
         $user->assigned_to = $id_user;

         return $user->save();
      }

}
