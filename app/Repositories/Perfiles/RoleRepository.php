<?php

namespace App\Repositories\Perfiles;

use Spatie\Permission\Models\Role;

class RoleRepository{

    /*
        Este metodo se utiliza para obtener los modelos Role, puede ser paginado o todo.
        Esa elección de ser paginado o todo, la tomaran las clases que hagan uso de este metodo mediante la
        clase servicio

    */
    public function all(){
        return Role::query();
    }

    public function create(string $perfil){
        return Role::create(['name' => $perfil]);
    }

    public function update($id , $perfil){
        $role = $this->find($id);
        $role->name = $perfil;
        return $role->save();
    }

    public function delete(int $id){
        $role =  $this->find($id);
        return $role->delete();
    }

    /**
     * Obtenemos un perfil correspondiente a un id
     */

    public function find($idPerfil){
        return Role::findOrFail($idPerfil);
    }

}
