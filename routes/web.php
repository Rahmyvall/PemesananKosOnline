<?php

use App\Http\Controllers\BoardingHouseController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Category routes
Route::resource('categories', CategoryController::class);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');

// City routes
Route::get('/city/{slug}', [CityController::class, 'show'])->name('city.show');

// Boarding House routes
Route::get('/kos/{slug}', [BoardingHouseController::class, 'show'])->name('kos.show');
Route::get('/kos/{slug}/rooms', [BoardingHouseController::class, 'rooms'])->name('kos.rooms');
Route::get('/boarding-house/results', [BoardingHouseController::class, 'results']);
Route::get('/find-kos', [BoardingHouseController::class, 'find'])->name('find-kos');
Route::get('/find-results', [BoardingHouseController::class, 'findResults'])->name('find-kos.results');

// Booking routes
Route::get('/kos/booking/{slug}', [BookingController::class, 'booking'])->name('booking');
Route::get('/kos/booking/{slug}/information', [BookingController::class, 'information'])->name('booking.information');
Route::post('/kos/booking/{slug}/information/save', [BookingController::class, 'saveInformation'])->name('booking.information.save');
Route::get('/kos/booking/{slug}/checkout', [BookingController::class, 'checkout'])->name('booking.checkout');
Route::post('/kos/booking/{slug}/payment', [BookingController::class, 'payment'])->name('booking.payment');
Route::get('/booking-success', [BookingController::class, 'success'])->name('booking.success');
Route::get('/booking/check', [BookingController::class, 'check'])->name('booking.check');
Route::get('/check-booking', [BookingController::class, 'check'])->name('check-booking');
Route::post('/check-booking', [BookingController::class, 'show'])->name('check-booking.show');
