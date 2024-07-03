<?php

namespace App\Http\Controllers\Administradores;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Perfiles\RoleService;
use App\Services\Permisos\PermisoService;
use App\Repositories\Permisos\PermisoRepository;

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


    public function createPermiso(Request $request)
    {
        try{
            $permisoService = new PermisoService(new PermisoRepository());
            $permisoService->create($request->input('perfil'));
            return response()->json(['message' => 'Permiso creado correctamente'] , 200);
        }catch(Exception $e){
            return response()->json(['message' => 'Error al crear el permiso'] , 500);
        }
    }


    public function getAllPermisos(Request $request){
        $permisoService = new PermisoService(new PermisoRepository());
        $permisos = $permisoService->allPermisos();

        return response()->json(['data' => $permisos]);
    }


    public function getPermisosRole(Request $request){
        $permisos = $this->servicio->getPermisosRole($request->input('perfil'));
        return response()->json(['data' => $permisos] , 200);
    }


}
