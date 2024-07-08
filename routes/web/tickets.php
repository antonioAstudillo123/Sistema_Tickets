<?php

use App\Http\Controllers\Tickets\TicketController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function ()
{
    Route::prefix('tickets')->group(function(){
        Route::controller(TicketController::class)->group(function()
        {
            Route::get('/reportes' , 'index')->name('tickets.index');
            Route::get('/getTicketsUser', 'getTicketsUser');
            Route::post('/getDetalleTicket' , 'getDetalleTicket');
            Route::post('/updateEstatus' , 'update');
            Route::get('/createPDF/{id}' , 'createPDF')->name('tickets.pdf');
        });
    });
});



