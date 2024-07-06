<?php

namespace App\View\Components\Select;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Services\Usuarios\UsuariosService;

class UsuariosSistemas extends Component
{

    public $usuariosSistemas;

    /**
     * Create a new component instance.
     */
    public function __construct(UsuariosService $service)
    {
        $this->usuariosSistemas = $service->getUsersSistemas();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.usuarios-sistemas');
    }
}
