<?php

namespace App\Http\Controllers\Inventario;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Inventario\MantenimientoService;


class Mantenimientos extends Controller
{
    private $service;

    public function __construct(MantenimientoService $service)
    {
        $this->service = $service;
    }


    public function index(){

        return view('inventario.mantenimientos.index');
    }


    //Obtenemos el detalle del mantenimiento para mostrarlo en el modal de view en el submodulo mantenimientos
    public function getDetalle(Request $request){
        return $this->service->getMantenimiento($request->input('id'));
    }


    //Completamos un mantenimiento. Deben de mandarnos el id y las observaciones
    public function completar(Request $request){

        try{

            $data = $request->all();
            $this->service->completar($data);

            return response()->json(['message' => 'Mantenimiento actualizado'] , 200);

        }catch(Exception $e){
            return response()->json(['message' => 'Tuvimos problemas al actualizar el mantenimiento'] , 500);
        }
    }
}
