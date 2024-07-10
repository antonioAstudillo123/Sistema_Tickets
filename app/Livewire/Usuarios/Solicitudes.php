<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Services\Usuarios\UsuariosService;

class Solicitudes extends Component
{
    use WithPagination;
    private $service;

    public function boot(UsuariosService $service){
        $this->service = $service;
    }

    public function render()
    {
        $tickets = $this->service->getUserTickets(Auth::user()->id)->paginate(10);
        return view('livewire.usuarios.solicitudes')->with('tickets' , $tickets);
    }
}
