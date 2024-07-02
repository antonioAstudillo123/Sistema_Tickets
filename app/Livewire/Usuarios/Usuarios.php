<?php

namespace App\Livewire\Usuarios;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Usuarios\UsuariosService;
use Exception;

class Usuarios extends Component
{
    use WithPagination;

    private $service;


    public function boot(UsuariosService $service){
        $this->service = $service;
    }

    public function render()
    {
        $usuarios = $this->service->allWithDeparment()->paginate(5);
        return view('livewire.usuarios.usuarios' , ['usuarios' => $usuarios ]);
    }

   // id , nameUser, phone, email, departamento, password
    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo){

        try{
            $this->service->updateUser($id , $name , $phone , $email , $departamento , $password , $sexo);
        }catch(Exception $e){
            $this->dispatch('user-update' , ['message' => 'Tuvimos problemas al actualizar el usuario' , 'icon' => 'error']);
        }

        $this->dispatch('user-update' , ['message' => 'Usuario actualizado con éxito' , 'icon' => 'success']);

    }
}
