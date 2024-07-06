<?php

namespace App\Http\Controllers\Tickets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tickets\TicketService;

class TicketController extends Controller
{

    private $service;

    public function __construct(TicketService $service)
    {
        $this->service = $service;
    }


    public function index()
    {
        return view('tickets.index');
    }


    public function getTicketsUser(){
        $usuarios =  $this->service->getTicketsWithUser()->get();

        foreach ($usuarios as $usuario) {
            echo '<pre>';
            if($usuario->assignedUser){
                echo $usuario->assignedUser->name;
            }

            echo '</pre>';

            echo '<hr>';
        }
    }

    public function getDetalleTicket(Request $request){
        return response()->json(['data' => $request->all()]);
    }
}
