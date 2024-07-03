<?php

namespace App\Services\Permisos;

use App\Repositories\Permisos\PermisoRepository;

class PermisoService{
    private $repositorio;


    public function __construct(PermisoRepository $repositorio)
    {
        $this->repositorio = $repositorio;
    }


    public function create($permiso){
        return $this->repositorio->create($permiso);
    }


    public function allPermisos(){
        return $this->repositorio->allPermisos();
    }
}
