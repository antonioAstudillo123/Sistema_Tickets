<?php

namespace App\Http\Controllers\Administradores;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Respaldos extends Controller
{
    public function index(){
        return view('administradores.respaldos.index');
    }
}
