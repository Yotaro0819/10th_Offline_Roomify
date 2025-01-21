<?php

use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/profile',function(){
    return view('guest_profile');
});
