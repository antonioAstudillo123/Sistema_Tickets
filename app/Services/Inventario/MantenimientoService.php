<?php


namespace App\Services\Inventario;

use App\Repositories\Inventario\MantenimientoRepository;

class MantenimientoService{
    private $repository;

    public function __construct(MantenimientoRepository $repository)
    {
        $this->repository = $repository;
    }

    //Creamos un nuevo mantenimiento
    public function create(array $data){
        return $this->repository->create($data);
    }


    //Obtenemos todos los mantenimientos
    public function all(){
        return $this->repository->all();
    }


    //Obtenemos la información de un mantenimiento en especifico
    public function getMantenimiento($id){
        return $this->repository->getMantenimiento($id);
    }

    //Actualizamos la informacion de un mantenimiento
    public function update(array $data){
        return $this->repository->update($data);
    }

    //Completamos un mantenimiento, debemos actualizar el estatus y las observaciones
    public function completar(array $data){
        return $this->repository->completar($data);
    }


    public function delete($id){
        return $this->repository->delete($id);
    }

}
