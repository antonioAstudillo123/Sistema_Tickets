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


     //Le cambiamos a un equipo su estatus en activo y su asignacion en null
     public function resetAsignacionEquipo($idEquipo){
        return $this->repository->resetAsignacionEquipo($idEquipo);
     }


     //Haremos un filtrado de los equipos mediante el número serial que nos ingrese el usuario
     public function searchFilterEquipo($query){
        return $this->repository->searchFilterEquipo($query);
     }
}
