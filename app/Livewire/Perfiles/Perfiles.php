<?php

namespace App\Livewire\Perfiles;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use App\Services\Perfiles\RoleService;

class Perfiles extends Component
{
    use WithPagination;
    private $service;

    public function boot(RoleService $service){
        $this->service = $service;
    }


    public function render()
    {
        $perfiles = $this->service->all()->paginate(3);


        return view('livewire.perfiles.perfiles' , ['perfiles' => $perfiles]);
    }


    public function create($perfil)
    {
        try {
            $this->service->create($perfil);
            $data = $this->setResult('Buen trabajo' , 'Perfil creado con éxito' , 'success');
        } catch (Exception $th) {
            $data = $this->setResult('Error' , 'No pudimos crear el perfil' , 'error');
        }

        $this->dispatch('role-created' , ['data' => $data]);
    }


    public function update($id , $perfil)
    {

        try {
            $this->service->update($id , $perfil);
            $data = $this->setResult('Buen trabajo' , 'Perfil actualizado con éxito' , 'success');
        } catch (\Throwable $th) {
            $data = $this->setResult('Error' , 'No pudimos actualizar el perfil' , 'error');
        }
        $this->dispatch('role-created' , ['data' => $data]);
    }


    public function delete($id){
        try {
            $this->service->delete($id);
            $data = $this->setResult('Buen trabajo' , 'Perfil eliminado con éxito' , 'success');
        } catch (\Throwable $th) {
            $data = $this->setResult('Error' , 'No pudimos eliminar el perfil' , 'error');
        }
        $this->dispatch('role-created' , ['data' => $data]);
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
