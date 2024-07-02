<?php

namespace App\Services\Usuarios;

use Illuminate\Support\Str;
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


    /*
        Actualizamos la informacion de un usuario
    */
    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo)
    {
        return $this->repository->updateUser($id , Str::title($name) , $phone , $email , $departamento , $password , $sexo);
    }

    /**
     * Eliminamos un usuario del sistema
     */

    public function deleteUser($id){
        return $this->repository->deleteUser($id);
    }


}
