<?php

namespace App\Models\Tickets;

use App\Models\User;
use Database\Factories\TicketFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketModel extends Model
{
    use HasFactory;
    protected $table = 'tickets';

    protected static function newFactory() : TicketFactory
    {
        return TicketFactory::new();
    }

    /*
        Un ticket pertenece a un usuario

    */
    public function user(){
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }


    /**
     * Un ticket se le asigna a un usuario
     */

    public function assignedUser(){
        return $this->belongsTo(User::class , 'assigned_to' , 'id');
    }
}
