<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\AccommodationController as AdminAccommodationController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\AccommodationController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HashtagController;
use App\Http\Controllers\HostRequestController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PayPalController;





Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('accommodation/show/{id}', [AccommodationController::class, 'show'])->name('accommodation.show');
Route::get('/accommodation/pictures/{id}', [AccommodationController::class, 'pictureIndex'])->name('accommodation.pictures');
Route::get('/accommodation/hashtag/{name}/{cityName?}', [HashtagController::class, 'index'])->name('accommodation.hashtag');

Auth::routes();
// Guest Without login can see these pages.


Route::group(['middleware' => 'auth'], function () {

//guest routes
Route::group(['prefix' => 'guest', 'as' => 'guest.'], function(){
    Route::get('/res', [BookingController::class, 'reservation_guest'])->name('reservation_guest');
    Route::get('/res/{bookingId}/cancel', [BookingController::class, 'confirmGuestCancel'])->name('confirmGuestCancel');
    Route::delete('/res/{bookingId}/cancel', [BookingController::class, 'guestCancel'])->name('guestCancel');
    Route::get('/booking-form/{id}', [BookingController::class, 'create'])->name('booking.create');
    Route::get('/booking/{id}', [BookingController::class, 'store'])->name('booking.store');
});

Route::get('/search', [AccommodationController::class, 'search'])->name('search');
Route::get('/search_by_keyword', [AccommodationController::class, 'search_by_keyword'])->name('search_by_keyword');
Route::get('/search_by_filters', [AccommodationController::class, 'search_by_filters'])->name('search_by_filters');


    Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');




    Route::post('/review/post/{id}', [ReviewController::class, 'store'])->name('review.store');


    Route::get('/host-request', [HostRequestController::class, 'create'])->name('hostRequest.create');
    Route::post('/host-request/store', [HostRequestController::class, 'store'])->name('hostRequest.store');



//Araki route
Route::get('/messages/{id}', [MessageController::class, 'index'])->name('messages.index');
Route::get('/messages/show/{id}', [MessageController::class, 'show'])->name('messages.show');
Route::post('/messages/store/{id}', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/search', [MessageController::class, 'search'])->name('messages.search');
//Araki route end

// host routes
Route::group(['middleware' => 'host'], function(){
    Route::get('/host/res',function(){
        return view('hostRes');
    });
});

Route::group(['prefix' => 'host', 'as' => 'host.', 'middleware' => 'host'], function(){
    Route::get('/res', [BookingController::class, 'reservation_host'])->name('reservation_host');
    // Route::get('/res/{bookingId}', [BookingController::class, 'showBookingStatus'])->name('showBookingStatus');
    Route::get('/res/{bookingId}/cancel', [BookingController::class, 'confirmCancel'])->name('confirmCancel');
    Route::delete('/res/{bookingId}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
    Route::get('/acmindex', [AccommodationController::class, 'index'])->name('index');
    Route::delete('/{id}/destroy,', [AccommodationController::class, 'destroy'])->name('destroy');
    Route::get('/accommodation/create', [AccommodationController::class, 'create'])->name('accommodation.create');
    Route::post('/accommodation/store', [AccommodationController::class, 'store'])->name('accommodation.store');
    ROute::get('/accommodation/edit/{id}', [AccommodationController::class, 'edit'])->name('accommodation.edit');
    Route::patch('/accommodation/update/{id}', [AccommodationController::class, 'update'])->name('accommodation.update');
});


// admin routes
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function(){
     // hostRequest page approve or reject.
    Route::get('/host-request/index', [HostRequestController::class, 'index'])->name('hostRequest.index');
    Route::patch('/host-request/approve/{id}', [HostRequestController::class, 'approve'])->name('hostRequest.approve');
    Route::post('/host-request/reject/{id}', [HostRequestController::class, 'reject'])->name('hostRequest.reject');

    //admin pages
    Route::get('/users', [AdminUsersController::class, 'index'])->name('users');
    Route::get('/people', [AdminUsersController::class, 'search'])->name('search');
    Route::delete('/users/{id}/deactivate', [AdminUsersController::class, 'deactivate'])->name('users.deactivate');
    Route::patch('/users/{id}/activate', [AdminUsersController::class, 'activate'])->name('users.activate');
    Route::patch('/users/{id}/change', [AdminUsersController::class, 'change'])->name('users.change');
    Route::get('/accommodation', [AdminAccommodationController::class, 'index'])->name('accommodation');
    Route::delete('/accommodation/{id}/deactivate', [AdminAccommodationController::class, 'deactivate'])->name('accommodation.deactivate');
    Route::patch('/accommodation/{id}/activate', [AdminAccommodationController::class, 'activate'])->name('accommodation.activate');
    Route::get('/accommodation/search', [AdminAccommodationController::class, 'search'])->name('accommodation.search');
    Route::get('/categories', [AdminCategoriesController::class, 'index'])->name('categories');
    Route::get('/categories/store', [AdminCategoriesController::class, 'store'])->name('category.store');
    Route::delete('/categories/delete/{id}', [AdminCategoriesController::class, 'delete'])->name('category.delete');
    Route::patch('/categories/edit/{id}', [AdminCategoriesController::class, 'update'])->name('category.edit');
});

Route::get('/coupones/{id}/', [CouponController::class, 'index'])->name('coupones.index');
Route::delete('/coupones/{id}/delete', [CouponController::class, 'destroy'])->name('coupones.delete');


Route::get('/paypal', function () {
    return view('paypal');
})->name('paypal');
Route::post('/paypal/{id}/payment', [PayPalController::class, 'createPayment'])->name('paypal.payment');
Route::get('/paypal/{id}/capture', [PaypalController::class, 'capturepayment'])->name('paypal.capture');
Route::get('/paypal/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');



Route::get('/cansel', function () {
    return view('bookingcansel');
});

});







