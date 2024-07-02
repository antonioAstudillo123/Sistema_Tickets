<?php

namespace App\Services\Departamentos;

use App\Repositories\Departamentos\Departamento as DepartamentosDepartamento;

class Departamento{
    private $repositorio;

    public function __construct(DepartamentosDepartamento $repositorio){
        $this->repositorio = $repositorio;
    }


    public function getDepartamentos(){
        return $this->repositorio->getDepartamentos();
    }

}

