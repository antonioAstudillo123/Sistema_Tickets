<?php

namespace App\Models\Inventarios;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mantenimientos extends Model
{
    use HasFactory;

    protected $table = 'mantenimientos';
    public $timestamps = false;

    /**
     * Un mantenimiento pertenece a un equipo
     *
     * @return void
     */
    public function equipo(){
        return $this->belongsTo(Equipo::class , 'id_equipo' , 'id');
    }

    public function user(){
        return $this->belongsTo(User::class , 'id_user' , 'id');
    }
}
