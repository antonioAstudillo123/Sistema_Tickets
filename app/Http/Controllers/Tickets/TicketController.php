<?php

namespace App\Http\Controllers\Tickets;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tickets\TicketService;
use Exception;

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

    public function update(Request $request)
    {
        try{
            $this->service->updateEstatus($request->input('id') , $request->input('estatus') , $request->input('comentarios'));
            return response()->json(['message' => 'Estatus actualizado'] , 200);
        }catch(Exception $e){
            return response()->json(['message' => 'Error al actualizar el estatus'] , 500);
        }



    }



    //metodo de prueba
    public function getTicketsUser(){
        $usuarios =  $this->service->filterSearch('baja' , 'Abierto')->paginate(10);


        return $usuarios;

        foreach ($usuarios as $usuario) {
            echo '<pre>';
            if($usuario->assignedUser){
                echo $usuario->assignedUser->name;
            }

            echo '</pre>';

            echo '<hr>';
        }
    }

    // metodo de prueba
    public function getDetalleTicket(Request $request){
        return response()->json(['data' => $request->all()]);
    }
}
