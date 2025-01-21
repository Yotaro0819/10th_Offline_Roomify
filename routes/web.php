<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\CategoriesController;




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Route::get('/profile',function(){
    return view('guest_profile');
});
Route::get('/booking-form', function(){
    return view('bookingForm');
});

Route::get('/search', function(){
    return view('search');
});

//Araki route
Route::get('accommodation/show', function () {
    return view('accommodation.show');
});
Route::get('/accommodation/create', function () {
    return view('accommodation.create');
});
Route::get('/accommodation/edit', function () {
    return view('accommodation.edit');
});
Route::get('/accommodation/pictures', function () {
    return view('accommodation.pictures');
});
Route::get('/messages', function () {
    return view('messages.index');
});
Route::get('/messages/show', function () {
    return view('messages.show');
});
Route::get('/accommodation/hashtag', function () {
    return view('accommodation.hashtag');
});
//Araki route end


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/accommodation', [AccommodationController::class, 'index'])->name('accommodation');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
});


Route::get('/coupon', function(){
    return view('coupon');
});


