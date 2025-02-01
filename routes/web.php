<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/home/booking', [HomeController::class, 'booking'])->name('booking');
Route::post('/home/booking', [TransactionController::class, 'store'])->name('booking.post');
