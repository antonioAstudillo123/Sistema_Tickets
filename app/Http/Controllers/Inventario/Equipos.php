<?php

namespace App\Http\Controllers\Inventario;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Inventario\EquipoService;
use Exception;

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
            return response()->json(['message' => 'Tuvimos problemas al crear el registro' . $e->getMessage() ] , 500);
        }

    }


    /*
        Obtenemos el detalle de la informacion de un equipo de computo, para mostrarlo
    */
    public function getDetalleEquipo(Request $request){
        return $this->service->getDetalleEquipo($request->input('id'));
    }
}
