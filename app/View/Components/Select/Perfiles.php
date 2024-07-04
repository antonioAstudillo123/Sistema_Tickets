<?php

namespace App\View\Components\Select;

use Closure;
use Illuminate\View\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Contracts\View\View;
use App\Services\Perfiles\RoleService;

class Perfiles extends Component
{
    public $perfiles;

    /**
     * Create a new component instance.
     */
    public function __construct(RoleService $service)
    {
        $this->perfiles = $service->all()->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.select.perfiles');
    }
}
