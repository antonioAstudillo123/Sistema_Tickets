<?php

namespace App\Models\Tickets;

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
}
