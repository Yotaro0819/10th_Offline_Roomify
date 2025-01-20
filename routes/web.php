<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/booking-form', function(){
    return view('bookingForm');
});

Route::get('/search', function(){
    return view('search');
});

