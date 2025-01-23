<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\AccommodationController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\UserAccommodationController;




Auth::routes();

Route::group(['middleware' => 'auth'], function() {

Route::get('/home', function () {
    return view('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/profile',function(){
    return view('guest_profile');
});

Route::get('/host/res',function(){
    return view('hostRes');
});

Route::get('/user/res',function(){
    return view('userRes');
});


Route::get('/booking-form', function(){
    return view('bookingForm');
});

Route::get('/search', function(){
    return view('search');
});

Route::get('/acmindex', function(){
    return view('acm_index_host');
});

//Araki route
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

Route::get('/coupon', function(){
    return view('coupon');
});

Route::get('/cansel', function () {
    return view('bookingcansel');
});

Route::group(['middleware' => 'host'], function(){
    Route::get('/host/res',function(){
        return view('hostRes');
    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
    Route::get('/users', [UsersController::class, 'index'])->name('users');
    Route::get('/accommodation', [AccommodationController::class, 'index'])->name('accommodation');
    Route::get('/categories', [CategoriesController::class, 'index'])->name('categories');
});

});


