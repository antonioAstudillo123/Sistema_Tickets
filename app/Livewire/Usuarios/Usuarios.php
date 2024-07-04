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
    public $query = "";


    public function boot(UsuariosService $service){
        $this->service = $service;
    }

    public function updatedQuery(){
        $this->resetPage();
    }

    public function render()
    {
        if($this->query !== ''){
            $usuarios = $this->service->filterUsers($this->query)->paginate(5);
        }else{
            $usuarios = $this->service->allWithDeparment()->paginate(5);
        }


        return view('livewire.usuarios.usuarios' , ['usuarios' => $usuarios ]);
    }

   // id , nameUser, phone, email, departamento, password
    public function updateUser($id , $name , $phone , $email , $departamento , $password , $sexo , $perfil){

        try{
            $data = [];
            $this->service->updateUser($id , $name , $phone , $email , $departamento , $password , $sexo , $perfil);
            $data = $this->setResult('Buen trabajo' , 'Usuario actualizado con éxito' , 'success');
        }catch(Exception $e){
            $data = $this->setResult('Error' , 'Tuvimos problemas al actualizar el usuario' , 'error');
        }

        $this->dispatch('user-update' , ['data' => $data]);

    }



    public function deleteUser($id)
    {
        try{
            $data = [];
            $this->service->deleteUser($id);
            $data = $this->setResult('Buen trabajo' , 'Usuario eliminado con éxito' , 'success');

        }catch(Exception $e){
            $data = $this->setResult('Error' , $e->getMessage() , 'error');
        }

        $this->dispatch('user-update' , ['data' => $data]);
    }


    private function setResult($title , $text , $icon)
    {
        $data = [];

        $data['icon'] = $icon;
        $data['title'] = $title;
        $data['text'] = $text;

        return $data;
    }
}
