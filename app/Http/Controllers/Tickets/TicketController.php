<?php

namespace App\Http\Controllers\Tickets;

use Exception;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Departamentos\DepartamentoModel;
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

    public function update(Request $request)
    {
        try{
            $this->service->updateEstatus($request->input('id') , $request->input('estatus') , $request->input('comentarios'));
            return response()->json(['message' => 'Estatus actualizado'] , 200);
        }catch(Exception $e){
            return response()->json(['message' => 'Error al actualizar el estatus'] , 500);
        }
    }


    public function createPDF($id)
    {
        $ticket = $this->service->createPDF($id);

       // return $ticket;
        $fpdf = new FPDF();
        $fpdf->AddPage();
        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->SetTextColor(252, 249, 248);
        $fpdf->SetFillColor(28,24,25);
        //Ancho - Alto - texto - border - ln - align - fill - link
        $fpdf->MultiCell(190, 10, 'Propiedades del Ticket', 1 , '0' , 'L',  true  );

        $fpdf->SetFillColor(252, 249, 248 );
        $fpdf->SetTextColor(5, 4, 4);
        $fpdf->MultiCell(50, 10, utf8_decode('Título'), 1 , '0' , 'L',  false  );

        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 28, utf8_decode(substr($ticket->title . '...' , 0 , 45) ),);



        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Empleado'), 1 , '0' , 'L',  false  );

        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 38, utf8_decode($ticket->user->name),);


        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Area'), 1 , '0' , 'L',  false  );

         $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 48, utf8_decode(DepartamentoModel::find($ticket->user->departamento_id)->departamento),);


        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Asignado a'), 1 , '0' , 'L',  false  );

        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 58, utf8_decode(  ($ticket->assignedUser === null) ? 'No tiene un usuario asignado' : $ticket->assignedUser->name),);



        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Prioridad'), 1 , '0' , 'L',  false  );

        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 68, utf8_decode($ticket->priority),);


        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Estatus'), 1 , '0' , 'L',  false  );


        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 78, utf8_decode($ticket->estatus),);


        $fpdf->SetFont('Courier', 'B', 20);
        $fpdf->MultiCell(50, 10, utf8_decode('Creado'), 1 , '0' , 'L',  false  );


        $fpdf->SetFont('Arial', '', 20);
        $fpdf->Text(63, 88, Carbon::parse($ticket->created_at)->format('d/m/Y - H:i:s'), );





        $fpdf->Output();
        exit();
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
