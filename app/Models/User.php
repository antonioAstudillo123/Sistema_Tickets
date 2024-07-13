<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use App\Models\Departamentos\DepartamentoModel;
use App\Models\Inventarios\Equipo;
use App\Models\Tickets\TicketModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'sexo',
        'phone'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    /*
            Relacionamos un usuario con un departamento

            Un usuario solo puede estar asociado a una departamento
            El segundo parametro de hasOne es la llave llave foranea del modelo al que estoy relacionando
            El tercer parametro es la llave local con la cual creo la relacion con mi otro modelo en este caso departamento
    */
    public function departamento(){
        return $this->hasOne(DepartamentoModel::class , 'id' , 'departamento_id');
    }



    /**
     * Creamos relacion con el modelo tickets
     * Un usuario puede tener uno o muchos tickets, así que la relación debe ser uno a muchos hasMany
     */

    public function tickets(){
        return $this->hasMany(TicketModel::class , 'user_id' , 'id');
    }


    /**
     * Un usuario tiene un equipo de computo
     */

     public function equipo(){
        return $this->hasOne(Equipo::class , 'assigned_user' , 'id');
     }


}
