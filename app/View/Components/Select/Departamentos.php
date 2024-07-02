<?php

namespace App\View\Components\Select;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Services\Departamentos\Departamento;

class Departamentos extends Component
{
    public $departamentos;
    private $servicio;


    public function __construct(Departamento $service)
    {
        $this->servicio = $service;
        $this->departamentos = $this->servicio->getDepartamentos();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.departamentos');
    }


}
