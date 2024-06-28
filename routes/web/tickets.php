<?php

use App\Http\Controllers\Tickets\TicketController;
use Illuminate\Support\Facades\Route;



Route::controller(TicketController::class)->group(function(){
    Route::get('/ticket' , 'index');
});
