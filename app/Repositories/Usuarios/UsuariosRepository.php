<?php

namespace App\Repositories\Usuarios;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;


class UsuariosRepository{

    /**
     * Obtenemos todos los usuarios con su respectivo departamento
     *
     * @return User
     */
    public function allWithDeparment(): Builder
    {
        return User::with('departamento');
    }


    /**
     * Obtenemos la informacion del usuario que nos manden por ID
     */

    public function getDataUser(int $id)
    {
        return User::with('departamento')->findOrFail($id);
    }

    /**
     * Actualizamos la informacion de un usuario dentro del sistema
     */

    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo){
        $user = User::findOrFail($id);

        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        $user->sexo = $sexo;
        $user->departamento_id = $departamento;

        if($password !== '')
        {
            $user->password = $password;
        }

       return $user->save();
    }
}
