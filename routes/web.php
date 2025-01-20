<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/booking-form', function(){
    return view('bookingForm');
});

Route::get('/show', function () {
    return view('accommodation.show');
});

