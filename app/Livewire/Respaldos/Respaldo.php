<?php

namespace App\Livewire\Respaldos;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class Respaldo extends Component
{
    public function render()
    {
        return view('livewire.respaldos.respaldo');
    }

    public function respaldar(){
        try{
            // Ejecutar el comando de Artisan para crear el respaldo
            Artisan::call('backup:run');

            // Obtener la salida del comando
            Artisan::output();
        }catch(Exception $e){
            $this->dispatch('respaldo-error' , ['message' => $e->getMessage()]);
        }
        $this->dispatch('respaldo-success' , ['message' => 'buen trabajo']);
    }
}
