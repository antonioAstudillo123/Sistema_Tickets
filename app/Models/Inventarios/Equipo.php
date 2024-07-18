<?php

namespace App\Models\Inventarios;

use App\Models\User;
use Database\Factories\EquiposFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventarios\Mantenimientos;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipos';

    protected static function newFactory() : EquiposFactory
    {
        return EquiposFactory::new();
    }

    public function user(){
        return $this->belongsTo(User::class , 'assigned_user' , 'id');
    }

    /*
        Un equipo puede tener uno o muchos mantenimientos
    */
    public function mantenimientos(){
        return $this->hasMany(Mantenimientos::class, 'id_equipo' , 'id');
    }



}
