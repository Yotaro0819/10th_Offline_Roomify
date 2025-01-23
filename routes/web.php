<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController as AdminUserController;
use App\Http\Controllers\Admin\AccommodationController as AdminAccommodationController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoryController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CouponContoller;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Auth;

Route::get('/home', function () {
    return view('home');
});

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');


Route::get('/profile',function(){
    return view('guest_profile');
});

// Route::get('/host/res',function(){
//     return view('hostRes');
// });

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


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('accommodation');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories');
});


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



