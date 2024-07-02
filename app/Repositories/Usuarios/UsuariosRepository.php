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


    /**
     * Buscamos usuarios que coincidan con el criterio de busqueda
     *
     * retornamos un Builder query
     */

    public function filterUsers($search){
        return User::where('name' , 'LIKE' , '%' . $search . '%')
        ->orWhere('email' , 'LIKE' , '%' . $search . '%')
        ->orWhere('phone' , 'LIKE' , '%' . $search . '%');
    }



    /**
     * Eliminamos un usuario del sistema
     */

    public function deleteUser($id){
        return User::destroy($id);
    }



}
