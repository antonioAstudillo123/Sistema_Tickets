<?php

namespace App\Models\Inventarios;

use App\Models\User;
use Database\Factories\EquiposFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departamentos\DepartamentoModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

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



}
