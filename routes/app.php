<?php

use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\DestinationController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->as('app.')->prefix('app')->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::get('bookings', [DestinationController::class, 'visits'])->name('bookings');

    Route::as('destination.')->prefix('destinations')->group(function(){

        Route::get('{id}', [DestinationController::class, 'show'])->name('show');

        Route::post('{id}/rate', [DestinationController::class, 'rate'])->name('rate');
        Route::post('{id}/book', [DestinationController::class, 'book'])->name('book');
    });
});
