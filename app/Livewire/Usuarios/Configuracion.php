<?php

namespace App\Livewire\Usuarios;

use Exception;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Services\Usuarios\UsuariosService;

class Configuracion extends Component
{

    #[Validate('required', message: 'El nombre es obligatorio')]
    #[Validate('string', message: 'El nombre debe ser una cadena')]
    #[Validate('max:255', message: 'El nombre no puede ser mayor a 255 caracteres')]
    public $name;

    #[Validate('required', message: 'El correo es obligatorio')]
    #[Validate('email', message: 'El correo debe ser válido')]
    #[Validate('max:255', message: 'El correo no puede ser mayor a 255 caracteres')]
    public $email;

    #[Validate('required', message: 'El teléfono es obligatorio')]
    #[Validate('string', message: 'El teléfono debe ser una cadena')]
    #[Validate('max:15', message: 'El teléfono no puede ser mayor a 15 caracteres')]
    public $phone;


    #[Validate('string', message: 'La contraseña debe ser un valor válido')]
    #[Validate('max:20', message: 'La contraseña no puede ser mayor a 20 caracteres')]
    public $password;


    private $service;

    public function mount(){
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->password = '';
        $this->phone = Auth::user()->phone;
    }



    public function boot(UsuariosService $service){
        $this->service = $service;
    }

    public function render()
    {
        return view('livewire.usuarios.configuracion');
    }

    public function update()
    {
        try{
            $this->validate();
            $this->service->updateUserBasic(Auth::user()->id , $this->name , $this->email , $this->password , $this->phone);
            $this->dispatch('user-update');
        }catch(Exception $e){
            $this->dispatch('user-error');
        }

    }
}
