<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\AccommodationController as AdminAccommodationController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
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
Route::get('accommodation/show/{id}', [AccommodationController::class, 'show'])->name('accommodation.show');
Route::get('/accommodation/pictures/{id}', [AccommodationController::class, 'pictureIndex'])->name('accommodation.pictures');
Route::get('/accommodation/hashtag/{name}/{cityName?}', [HashtagController::class, 'index'])->name('accommodation.hashtag');
Auth::routes();
// Guest Without login can see these pages.


Route::group(['middleware' => 'auth'], function () {


    Route::get('/profile', function () {
        return view('guest_profile');
    });

    Route::get('/user/res', function () {
        return view('userRes');
    });

    Route::get('/booking-form/{id}', [BookingController::class, 'create'])->name('booking.create');

    Route::get('/search', function () {
        return view('search');
    });
    Route::post('/review/post/{id}', [ReviewController::class, 'store'])->name('review.store');


    //Araki route

    Route::get('/messages', function () {
        return view('messages.index');
    });
    Route::get('/messages/show', function () {
        return view('messages.show');
    });

    //Araki route end

// host routes
Route::group(['prefix' => 'host', 'as' => 'host.', 'middleware' => 'host'], function(){
    Route::get('/res', [BookingController::class, 'reservation'])->name('reservation');
    Route::get('/res/{bookingId}', [BookingController::class, 'showBookingStatus'])->name('showBookingStatus');
    Route::get('/res/{bookingId}/cancel', [BookingController::class, 'confirmCancel'])->name('confirmCancel');
    Route::post('/res/{bookingId}/cancel', [BookingController::class, 'cancel'])->name('cancel');
    Route::get('/acmindex', [AccommodationController::class, 'index'])->name('index');
    Route::delete('/{id}/destroy,', [AccommodationController::class, 'destroy'])->name('destroy');
    Route::get('/accommodation/create', [AccommodationController::class, 'create'])->name('accommodation.create');
    Route::post('/accommodation/store', [AccommodationController::class, 'store'])->name('accommodation.store');
    ROute::get('/accommodation/edit/{id}', [AccommodationController::class, 'edit'])->name('accommodation.edit');
    Route::patch('/accommodation/update/{id}', [AccommodationController::class, 'update'])->name('accommodation.update');
});

// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
    Route::get('/users', [AdminUsersController::class, 'index'])->name('users');
    Route::get('/people', [AdminUsersController::class, 'search'])->name('search');
    Route::delete('/users/{id}/deactivate', [AdminUsersController::class, 'deactivate'])->name('users.deactivate');
    Route::patch('/users/{id}/activate', [AdminUsersController::class, 'activate'])->name('users.activate');
    Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('accommodation');
    Route::delete('/accommodation/{id}/deactivate', [AdminAccommodationController::class, 'deactivate'])->name('accommodation.deactivate');
    Route::patch('/accommodation/{id}/activate', [AdminAccommodationController::class, 'activate'])->name('accommodation.activate');
    Route::get('/accommodation/search', [AdminAccommodationController::class, 'search'])->name('accommodation.search');
    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/store', [AdminCategoriesController::class, 'store'])->name('category.store');
    Route::delete('/categories/delete/{id}', [AdminCategoriesController::class, 'delete'])->name('category.delete');
    Route::patch('/categories/edit/{id}', [AdminCategoriesController::class, 'update'])->name('category.edit');
});

Route::get('/coupon', function(){
    return view('coupon');
});

Route::get('/cansel', function () {
    return view('bookingcansel');
});

});







