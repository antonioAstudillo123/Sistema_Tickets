<?php


namespace App\Repositories\Inventario;

use App\Models\Inventarios\Equipo;


class EquipoRepository
{
    /*
        Debemos obtener todos los equipos que estan registrados en el sistema
    */
    public function all(){
        return Equipo::query();
    }

    /**
     * Creamos un nuevo equipo
     */

    public function create(array $data){
        $equipo = new Equipo;

        $equipo->serial_number = $data['serial'];
        $equipo->marca =  $data['marca'];
        $equipo->modelo = $data['modelo'] ;
        $equipo->procesador = $data['procesador'] ;
        $equipo->ram = $data['ram'] ;
        $equipo->almacenamiento = $data['almacenamiento'] ;
        $equipo->sistema_operativo = $data['sistema_operativo'] ;
        $equipo->fecha_compra = $data['fecha_compra'] ;
        $equipo->fecha_garantia = $data['fecha_garantia'] ;
        $equipo->assigned_user = $data['idUser'] ;
        $equipo->mac = $data['mac'] ;
        $equipo->ip =  $data['ip'];
        $equipo->notas = $data['notas'];
        $equipo->estatus =  ($data['idUser'] === null) ? 'Activo':'En uso';

        return $equipo->save();
    }

    //Obtenemos la informacion de un equipo junto con el usuario al que pertenece
    public function getDetalleEquipo($idEquipo){
        return Equipo::with(['user.departamento'])->where('id' , '=' , $idEquipo)->get();
    }



    //Obtenemos la informacion de un equipo
    public function getEquipo($idEquipo){
        return Equipo::findOrFail($idEquipo);
    }

    //Formateamos la asignacion del equipo
    public function resetAsignacionEquipo($idEquipo){
        $equipo = $this->getEquipo($idEquipo);
        $equipo->estatus = 'Activo';
        $equipo->assigned_user = null;
        return $equipo->save();
    }

    //Filtramos los equipos mediante número de serial
    public function searchFilterEquipo($query){
        return Equipo::where('serial_number', 'like', '%' . $query . '%');
    }


    //Comprobamos si el número serial existe
    public function serialExists($serial){
        return Equipo::where('serial_number' , '=' , $serial)->exists();
    }
}


