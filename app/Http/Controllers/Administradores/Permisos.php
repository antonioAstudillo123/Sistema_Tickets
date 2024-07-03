<?php

namespace App\Http\Controllers\Administradores;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Perfiles\RoleService;

class Permisos extends Controller
{
    private $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
    }


    public function update(Request $request)
    {
        $data =  $this->service->addPermissionsToRole($request->input('id') , $request->input('data'));
        return response()->json(['message' => 'Permisos actualizados correctamente' , 'data' => $data] , 200);
    }
}
