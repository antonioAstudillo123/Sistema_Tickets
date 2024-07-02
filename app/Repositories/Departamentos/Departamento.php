<?php


namespace App\Repositories\Departamentos;

use App\Models\Departamentos\DepartamentoModel;


class Departamento{

    public function getDepartamentos(){
        return DepartamentoModel::orderBy('departamento','asc')->get();
    }
}
