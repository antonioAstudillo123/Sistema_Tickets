<?php

use App\Http\Controllers\Administradores\Perfiles;
use App\Http\Controllers\Administradores\Usuarios;
use Illuminate\Support\Facades\Route;



Route::prefix('usuarios')->group(function () {
    Route::controller(Usuarios::class)->group(function(){
        Route::get('/index' , 'index')->name('usuarios.index');
        Route::get('/usuarios' , 'allWithDeparment');
        Route::post('/getDataUser' , 'getDataUser');
    });
});


Route::prefix('perfiles')->group(function(){
    Route::controller(Perfiles::class)->group(function(){
        Route::get('/index' , 'index')->name('perfiles.index');
        Route::post('/getData' ,'getData');
    });
});
