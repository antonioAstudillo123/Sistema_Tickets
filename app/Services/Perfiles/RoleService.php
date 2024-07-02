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

    public function update($id , $perfil){
        return $this->repositorio->update($id ,Str::ucfirst($perfil));
    }

    /*
        Obtenemos la información del perfil para poder llenar el modal de edit perfil
    */
    public function getData(int $id){
        return $this->repositorio->getData($id);
    }

    public function delete(int $id){
        return $this->repositorio->delete($id);
    }
}
