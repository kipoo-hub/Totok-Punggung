<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;


Route::get('/', [BookingController::class, 'index']);
Route::post('/booking', [BookingController::class, 'submit'])->name('booking.submit');
