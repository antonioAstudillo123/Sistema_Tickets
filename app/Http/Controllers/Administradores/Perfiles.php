<?php

namespace App\Http\Controllers\Administradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Perfiles\RoleService;

class Perfiles extends Controller
{
    private $servicio;


    public function __construct(RoleService $service)
    {
        $this->servicio = $service;
    }


    public function index(){
       return view('administradores.perfiles.index');
    }


    public function getData(Request $request){
        $id = $request->input('id');

        return response()->json(['data' => $this->servicio->getData($id)] , 200);
    }


}
