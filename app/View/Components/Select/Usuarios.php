<?php

namespace App\View\Components\Select;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Services\Usuarios\UsuariosService;

class Usuarios extends Component
{


    public $usuarios;

    /**
     * Create a new component instance.
     */
    public function __construct(UsuariosService $service)
    {
        $this->usuarios = $service->all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.usuarios');
    }
}
