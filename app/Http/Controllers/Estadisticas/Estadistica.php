<?php

namespace App\Http\Controllers\Estadisticas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\Tickets\TicketService;

class Estadistica extends Controller
{

    private $ticketService;


    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function index()
    {
        $estatus = ['Abierto' => 0 , 'En progreso' => 0 , 'Cancelado' => 0 , 'Abierto' => 0 , 'Resuelto' => 0];

        $data = $this->ticketService->all()
        ->selectRaw('estatus, count(*) as total')
        ->groupBy('estatus')
        ->get();


       $data->each(function ($raw) use (&$estatus) {
            if(isset($estatus[$raw->estatus])){
                $estatus[$raw->estatus] = $raw->total;
            }
        });


       return view('estadisticas.index' , ['resultado' => $estatus]);
    }


    /*
        Con este metodo vamos a obtener la información de los tickets asignados a un usuario para de esa manera
        poder dibujar una grafica de tipo dona y el usuario pueda ver de manera grafica
        la cantidad de tickets que se le a asignado a cada usuario de sistemas
    */
    public function getTicketsUser(){
        $resultado = DB::table('tickets')->join('users' , 'tickets.assigned_to' , '=' , 'users.id' )->selectRaw('users.name , count(*) as total')->groupBy('tickets.assigned_to')->get();

        return response()->json(['data' => $resultado]);
    }


    /**
     * Este metodo nos va servir para obtener todos los tickets que se hacen por departamento
     */

    public function getTicketsDepartments(){
        $resultado = DB::table('departamentos')->join('users' , 'users.departamento_id' , '=' , 'departamentos.id')
            ->join('tickets' , 'tickets.user_id' , '=' , 'users.id')
            ->selectRaw('departamento , count(*) as total')->groupBy('departamento')->get();

        return response()->json(['data' => $resultado]);
    }
}
