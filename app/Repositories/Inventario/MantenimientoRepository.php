<?php

namespace App\Repositories\Inventario;

use App\Models\Inventarios\Mantenimientos;

class MantenimientoRepository{


    public function all(){
        return Mantenimientos::with(['user' , 'equipo']);
    }

    public function create(array $data){
        $mantenimiento = new Mantenimientos;

        $mantenimiento->fecha_mantenimiento = $data['fecha'];
        $mantenimiento->tipo_mantenimiento = $data['tipo'];
        $mantenimiento->descripcion = $data['descripcion'];
        $mantenimiento->estatus = 'En proceso';
        $mantenimiento->id_equipo = $data['equipo'];
        $mantenimiento->id_user = $data['user'];

        return $mantenimiento->save();
    }

    public function getMantenimiento($id){
        return Mantenimientos::with(['user' , 'equipo' => function($query) use($id) {
            $query->where('id' , '=' , $id);
        }])->find($id);
    }



    public function update(array $data)
    {
        $mantenimiento = Mantenimientos::findOrFail($data['id']);

        $mantenimiento->fecha_mantenimiento = $data['fecha'];
        $mantenimiento->tipo_mantenimiento = $data['tipo'];
        $mantenimiento->descripcion = $data['descripcion'];
        $mantenimiento->id_equipo = $data['equipo'];
        $mantenimiento->id_user = $data['user'];

        return $mantenimiento->save();
    }


    //Actualizamos el estatus del mantenimiento. Debe obligatoriamente ingresarnos las observaciones, para mantener un historico completo con información.
    public function completar(array $data){
        $mantenimiento = Mantenimientos::findOrFail($data['id']);

        $mantenimiento->estatus = 'Completado';
        $mantenimiento->observaciones = $data['observaciones'];

        return $mantenimiento->save();
    }


    public function delete($id){
        return Mantenimientos::destroy($id);
    }
}
