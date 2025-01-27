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




Route::get('/', function () {
    return view('home');
});

Auth::routes();


Route::get('/accommodation/show/{id}', [AccommodationController::class, 'show'])->name('accommodation.show');


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

    Route::get('/profile', function () {
        return view('guest_profile');
    });

    Route::get('/user/res', function () {
        return view('userRes');
    });

    Route::get('/booking-form', function () {
        return view('bookingForm');
    });

    Route::get('/search', function () {
        return view('search');
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

    // host routes
    Route::group(['middleware' => 'host'], function () {
        Route::get('/host/res', function () {
            return view('hostRes');
        });
    });

    // admin routes
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
        Route::get('/users', [AdminUserController::class, 'index'])->name('users');
        Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('accommodation');
        Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories');
    });

    Route::get('/coupon', function () {
        return view('coupon');
    });

    Route::get('/cansel', function () {
        return view('bookingcansel');
    });
});

// host routes
Route::group(['prefix' => 'host', 'as' => 'host.', 'middleware' => 'host'], function(){
    Route::get('/res',function(){
        return view('hostRes');});
    Route::get('/acmindex', [AccommodationController::class, 'index'])->name('index');
    Route::delete('/{id}/destroy,', [AccommodationController::class, 'destroy'])->name('destroy');

});

// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
    Route::get('/users', [AdminUserController::class, 'index'])->name('users');
    Route::get('/people', [AdminUserController::class, 'search'])->name('search');
    Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('accommodation');
    Route::get('/categories', [AdminCategoryController::class, 'index'])->name('categories');
});

Route::get('/coupon', function(){
    return view('coupon');
});

Route::get('/cansel', function () {
    return view('bookingcansel');
});





