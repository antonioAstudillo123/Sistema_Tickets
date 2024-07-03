<?php

namespace App\Repositories\Permisos;

use Spatie\Permission\Models\Permission;

class PermisoRepository{

    //Creamos un nuevo permiso en el sistema
    public function create($permiso){
        return Permission::create(['name' => $permiso]);
    }

    //Obtenemos todos los permisos que existen
    public function allPermisos(){
        return Permission::all();
    }


}
