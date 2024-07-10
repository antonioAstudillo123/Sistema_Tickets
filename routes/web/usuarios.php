<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usuarios\Configuracion;
use App\Http\Controllers\Administradores\Perfiles;
use App\Http\Controllers\Administradores\Permisos;
use App\Http\Controllers\Administradores\Usuarios;

Route::middleware(['auth'])->group(function()
{
    Route::prefix('usuarios')->group(function () {
        Route::controller(Usuarios::class)->group(function(){
            Route::get('/index' , 'index')->name('usuarios.index');
            Route::get('/usuarios' , 'allWithDeparment');
            Route::post('/getDataUser' , 'getDataUser');
            Route::post('/create' , 'create');

            //Ruta de pruena
            Route::get('/prueba' , 'prueba');
        });

        //Rutas para trabajar con el submodulo de configuracion cuenta dentro del modulo usuarios
        Route::controller(Configuracion::class)->group(function(){
            Route::get('configuracion/index' , 'index')->name('usuarios.configuracion.index');
        });
    });

    Route::prefix('perfiles')->group(function()
    {
        Route::controller(Perfiles::class)->group(function()
        {
            Route::get('/index' , 'index')->name('perfiles.index');
            Route::post('/getData' ,'getData');
            Route::post('/createPermiso' , 'createPermiso');
            Route::get('/getAllPermisos' , 'getAllPermisos');
            Route::post('/getPermisosRole' , 'getPermisosRole');

        });

        Route::controller(Permisos::class)->group(function()
        {
            Route::post('/update' , 'update');
        });
    });
});




