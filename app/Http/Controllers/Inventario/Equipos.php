<?php

namespace App\Http\Controllers\Inventario;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Inventarios\Equipo;
use App\Http\Controllers\Controller;
use App\Services\Inventario\EquipoService;

class Equipos extends Controller
{

    private $service;

    public function __construct(EquipoService $service)
    {
        $this->service = $service;
    }
    public function index(){
        return view('inventario.equipos.index');
    }

    //Creamos un nuevo equipo
    public function create(Request $request)
    {
        try{
            $this->service->create($request->all());
            return response()->json(['message' => 'Equipo creado correctamente' ] , 200);
        }catch(Exception $e){
            return response()->json(['message' => 'Tuvimos problemas al crear el registro. ' . $e->getMessage() ] , 500);
        }

    }


    /*
        Obtenemos el detalle de la informacion de un equipo de computo, para mostrarlo
    */
    public function getDetalleEquipo(Request $request){
        return $this->service->getDetalleEquipo($request->input('id'));
    }



    public function prueba(){


        $assignedUserIds = Equipo::where('assigned_user', '<>', '')
        ->pluck('assigned_user');

            $usuarios =  User::whereNotIn('id', $assignedUserIds)->get();


        foreach ($usuarios as $usuario) {
            var_dump($usuario);
        }

        die();
        return $this->service->sinUsuario();
    }
}
