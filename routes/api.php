<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

Route::get('/rankings', [HomeController::class, 'getRanking']);
Route::get('/monthly-bookings', [HomeController::class, 'getMonthlyBookings']);


