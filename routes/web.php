<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\CategoriesController;




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/booking-form', function(){
    return view('bookingForm');
});

Route::get('/show', function () {
    return view('accommodation.show');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/accommodation', [AccommodationController::class, 'index'])->name('accommodation');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
});


Route::get('/coupon', function(){
    return view('coupon');
});


