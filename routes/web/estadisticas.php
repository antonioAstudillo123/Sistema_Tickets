<?php

use App\Http\Controllers\Estadisticas\Estadistica;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function ()
{
    Route::prefix('estadisticas')->group(function(){
        Route::controller(Estadistica::class)->group(function()
        {
            Route::get('/index' , 'index')->name('estadisticas.index');
            Route::get('/getTicketsUser' , 'getTicketsUser');
            Route::get('/getTicketsDepartments' , 'getTicketsDepartments');
        });
    });
});
