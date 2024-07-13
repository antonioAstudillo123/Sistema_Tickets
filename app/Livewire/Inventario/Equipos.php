<?php

namespace App\Livewire\Inventario;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Inventario\EquipoService;

class Equipos extends Component
{
    use WithPagination;
    private $service;

    public function boot(EquipoService $service){
        $this->service = $service;
    }

    public function render()
    {
        $equipos = $this->service->all()->paginate(10);

        return view('livewire.inventario.equipos', ['equipos' => $equipos]);
    }
}
