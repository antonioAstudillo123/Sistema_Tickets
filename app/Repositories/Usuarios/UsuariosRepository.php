<?php

namespace App\Repositories\Usuarios;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;


class UsuariosRepository{

    /**
     * Obtenemos todos los usuarios con su respectivo departamento
     *
     * @return Builder
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
        return User::with(['departamento' , 'roles'])->findOrFail($id);
    }


    /**
     * Creamos un usuario en el modelo User
     */

     public function createUser(array $data){
        $user = new User;

        $user->name = Str::title($data['nombre']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->sexo = $data['sexo'];
        $user->password = $data['password'];
        $user->departamento_id = $data['departamento'];

        $user->save();


        return $user;

     }

    /**
     * Actualizamos la informacion de un usuario dentro del sistema
     */

    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo){
        $user =  $this->getUser($id);

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


    /**
     * Obtenemos un usuario
     */

    public function getUser($id){
        return User::findOrFail($id);
    }


    /**
     * Obtenemos todos los usuarios junto con los tickets que han generado
     */

     public function getUsersWithTickets(){
        return User::with('tickets');
     }


     /**
      * Obtenemos todos los usuarios que sean del departamento de sistemas
      */

      public function getUsersSistemas(){
        return User::whereHas('departamento' , function(Builder $query){
            $query->where('departamento' , '=' ,'Sistemas');
        })
        ->orderBy('name' , 'asc')
        ->get();
      }


    /**
       * Actualizamos la informacion básica de un usuario
    */
    public function updateUserBasic($idUser , $name , $email, $password , $phone)
    {
        $user = User::findOrFail($idUser);

        $user->name = $name;
        $user->email = $email;
        $user->phone = $phone;
        if($password !== '')
        {
            $user->password = $password;
        }

        return $user->save();
    }



}
