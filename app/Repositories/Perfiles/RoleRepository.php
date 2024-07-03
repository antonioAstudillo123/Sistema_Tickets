<?php

namespace App\Repositories\Perfiles;

use Spatie\Permission\Models\Role;

class RoleRepository{


    public function all(){
        return Role::paginate(5);
    }

    public function create(string $perfil){
        return Role::create(['name' => $perfil]);
    }

    public function getData(int $id){
        return Role::find($id);
    }

    public function update($id , $perfil){
        $role = Role::findOrFail($id);

        $role->name = $perfil;

        return $role->save();
    }

    public function delete(int $id){
        $role = Role::findOrFail($id);

        return $role->delete();
    }

    /**
     * Obtenemos un perfil correspondiente a un id
     */

    public function find($idPerfil)
    {
        return Role::findOrFail($idPerfil);
    }

}
