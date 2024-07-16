<?php

namespace App\View\Components\Select;

use Closure;
use App\Models\User;
use Illuminate\View\Component;
use App\Models\Inventarios\Equipo;
use Illuminate\Contracts\View\View;

class UsuariosSinEquipo extends Component
{
    public $usuarios;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $assignedUserIds = Equipo::where('assigned_user', '<>', '')
    ->pluck('assigned_user');

        $this->usuarios = User::whereNotIn('id', $assignedUserIds)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.usuarios-sin-equipo');
    }
}
