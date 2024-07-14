<?php


namespace App\Services\Inventario;

use App\Repositories\Inventario\EquipoRepository;


class EquipoService{
    private $repository;

    public function __construct(EquipoRepository $repository)
    {
        $this->repository = $repository;
    }


    //Obtenemos todos los equipos almacenados en el sistema
    public function all(){
        return $this->repository->all();
    }


    /**
     * Creamos un nuevo equipo en el sistema
     */

    public function create(array $data){
        return $this->repository->create($data);
    }


    /**
     * Obtenemos la información detallada de un equipo
     */

     public function getDetalleEquipo($idEquipo){
        return $this->repository->getDetalleEquipo($idEquipo);
     }


     public function getEquipo($idEquipo){
        return $this->repository->getEquipo($idEquipo);
     }


     public function resetAsignacionEquipo($idEquipo){
        return $this->repository->resetAsignacionEquipo($idEquipo);
     }
}
