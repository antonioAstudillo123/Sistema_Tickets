<?php

namespace App\Services\Perfiles;

use Illuminate\Support\Str;
use App\Repositories\Perfiles\RoleRepository;

class RoleService{
    private $repositorio;

    public function __construct(RoleRepository $repository)
    {
        $this->repositorio = $repository;
    }


    public function all(){
        return $this->repositorio->all();
    }


    public function create(string $perfil){
        return $this->repositorio->create(Str::ucfirst($perfil));
    }

    //Actualizamos la informacion de un perfil
    public function update($id , $perfil){
        return $this->repositorio->update($id ,Str::ucfirst($perfil));
    }

    /*
        Obtenemos la información del perfil para poder llenar el modal de edit perfil
    */
    public function getData(int $id){
        return $this->repositorio->find($id);
    }

    public function delete(int $id){
        return $this->repositorio->delete($id);
    }


    /*
        Este metodo se va a encargar de sincronizarle a un role permisos enviados desde el cliente.
    */
    public function addPermissionsToRole($role , $permisos){
        $role =  $this->repositorio->find($role);
        return $role->syncPermissions($permisos);
    }


    public function getPermisosRole($perfil){
        $role = $this->repositorio->find($perfil);
        return $role->permissions;
    }
}
