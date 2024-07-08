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
     * Actualizamos un estatus de un ticket
     * Es importante que al actualizar, se manden los comentarios
     */

     public function updateEstatus($idTicket , $estatus , $comentarios){
        $ticket = TicketModel::findOrFail($idTicket);

        $ticket->estatus = $estatus;
        $ticket->comentarios = $comentarios;

        return $ticket->update();
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
         $ticket = TicketModel::findOrFail($id_ticket);
         $ticket->priority = $prioridad;
         $ticket->assigned_to = $id_user;
         $ticket->estatus = 'En progreso';

         return $ticket->save();
      }


      /**
       * Filtramos los tickets por prioridad y estatus
       */
    public function filterSearch($prioridad , $estatus){
        return TicketModel::where('priority' , $prioridad)->where('estatus' , $estatus);
    }

}
