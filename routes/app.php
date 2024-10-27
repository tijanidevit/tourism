<?php

use App\Http\Controllers\App\HomeController;
use App\Http\Controllers\App\DestinationController;
use App\Http\Controllers\App\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->as('app.')->prefix('app')->group(function () {
    Route::get('home', HomeController::class)->name('home');
    Route::get('bookings', [DestinationController::class, 'visits'])->name('bookings');
    Route::get('map', [DestinationController::class, 'map'])->name('map');

    Route::as('destination.')->prefix('destinations')->group(function(){

        Route::get('{id}', [DestinationController::class, 'show'])->name('show');

        Route::post('{id}/rate', [DestinationController::class, 'rate'])->name('rate');
        Route::post('{id}/book', [DestinationController::class, 'book'])->name('book');
    });

    Route::as('profile.')->prefix('profile')->group(function(){

        Route::view('', 'app.profile.index')->name('index');
        Route::post('', [ProfileController::class, 'update'])->name('update');
    });
});
