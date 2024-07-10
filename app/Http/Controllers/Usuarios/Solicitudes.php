<?php

namespace App\Http\Controllers\Usuarios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Solicitudes extends Controller
{
    public function index(){
        return view('usuarios.solicitudes.index');
    }
}
