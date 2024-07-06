<?php

namespace App\Http\Controllers\Administradores;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Usuarios\UsuariosService;

class Usuarios extends Controller
{
    private $service;


    public function __construct(UsuariosService $service){
        $this->service = $service;
    }



    public function index()
    {
        return view('administradores.usuarios.index');
    }

    public function allWithDeparment(){
        return $this->service->allWithDeparment();
    }


    //Obtenemos la informacion de un usuario
    public function getDataUser(Request $request)
    {
        $id = $request->input('id');
        return response()->json(['data' => $this->service->getDataUser($id)]);
    }


    public function create(Request $request){

        try{
            $this->service->createUser($request->all());
            return response()->json(['message' => 'Usuarios creado correctamente'] , 200);
        }catch(Exception $e){
            return response()->json(['message' => $e->getMessage() ] , 500);
        }
    }

    public function prueba(){
        return $this->service->getUsersSistemas();
    }
}
