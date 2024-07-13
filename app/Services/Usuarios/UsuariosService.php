<?php

namespace App\Services\Usuarios;

use Illuminate\Support\Str;
use App\Repositories\Perfiles\RoleRepository;
use App\Repositories\Usuarios\UsuariosRepository;


class UsuariosService{
    private $repository;


    public function __construct(UsuariosRepository $repository)
    {
        $this->repository = $repository;
    }

    //Obtenemos todos los usuarios con sus respectivos departamentos
    public function allWithDeparment(){
        return $this->repository->allWithDeparment();
    }


    /*
        Obtenemos la informacion de un usuario en especifico mediante su ID
     */
    public function getDataUser(int $id){
        return $this->repository->getDataUser($id);
    }


    /**
     * En este método de servicio aparte de crear el usuario en el modelo User,
     * debemos asignarle el role mediante el modelo Role de la libreria Spatie
    */

    public function createUser(array $data){
        $user = $this->repository->createUser($data);

        //Instanciamos clase RoleRepository la cual es la encargada de ejecutar las operaciones a la BD correspondiente a modelo
        //Role

        $roleService = new RoleRepository();

        //Buscamos el role que queremos asignarle al usuario
        $role = $roleService->find($data['perfil']);

        return $user->assignRole($role->name);

    }


    /*
        Actualizamos la informacion de un usuario mediante el modulo de administradores
    */
    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo , $perfil)
    {
        $roleService = new RoleRepository();

        //Actualizamos la informacion del usuario
        $this->repository->updateUser($id , Str::title($name) , $phone , $email , $departamento , $password , $sexo);

        $user = $this->repository->getUser($id);
        $perfil = $roleService->find($perfil);

        //Actualizamos el perfil del usuario
        return $user->syncRoles([$perfil->name]);
    }

    /**
     * Eliminamos un usuario del sistema
     */

    public function deleteUser($id){
        return $this->repository->deleteUser($id);
    }



    /**
     * Obtenemos a los usuarios que cumplan con los criterios de búsqueda ingresado por el usuario
     *
     * Retornamos un Builder query
     */

    public function filterUsers($search){
        return $this->repository->filterUsers($search);
    }


    /**
     * Obtenemos todos los usuarios que sean del departamento de sistemas
     */

    public function getUsersSistemas(){
        return $this->repository->getUsersSistemas();
    }



    /**
     * Actualizamos la información básica del usuario, este proceso se hace mediante el modulo de usuarios
     */

    public function updateUserBasic($idUser , $name , $email, $password , $phone){
        return $this->repository->updateUserBasic($idUser , Str::title($name) , $email, $password , $phone);
    }




    /**
     * Obtenemos todos los tickets de un usuario
     */

     public function getUserTickets($idUser){
        return $this->repository->getUser($idUser)->tickets();
     }


     /**
      * Obtenemos todos los usuarios del sistema
      */
     public function all(){
        return $this->repository->all();
     }

}
