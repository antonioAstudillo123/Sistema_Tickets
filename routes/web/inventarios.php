<?php

use App\Http\Controllers\Inventario\Equipos;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::prefix('inventarios')->group(function(){
        Route::controller(Equipos::class)->group(function(){
            Route::get('/equipos/index' , 'index')->name('inventarios.equipos.index');
            Route::post('/equipos/create', 'create');
            Route::post('/equipos/detalle' , 'getDetalleEquipo');
        });
    });

});
