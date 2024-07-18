<?php

use App\Http\Controllers\Inventario\Equipos;
use App\Http\Controllers\Inventario\Mantenimientos;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){

    Route::prefix('inventarios')->group(function(){
        Route::controller(Equipos::class)->group(function(){
            Route::get('/equipos/index' , 'index')->name('inventarios.equipos.index');
            Route::post('/equipos/create', 'create');
            Route::post('/equipos/detalle' , 'getDetalleEquipo');


            //Ruta de prueba
            Route::get('/equipos/prueba' , 'prueba');
        });


        Route::controller(Mantenimientos::class)->group(function(){
            Route::get('/mantenimientos/index', 'index')->name('inventarios.mantenimientos.index');
            Route::post('/mantenimientos/getDetalle' , 'getDetalle');
            Route::post('/mantenimientos/completar' , 'completar');
        });
    });

});
