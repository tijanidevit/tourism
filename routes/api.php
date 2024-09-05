<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DestinationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::as('api.')->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');

        Route::as('destination.')
            ->prefix('destinations')
            ->group(function () {
                Route::get('', [DestinationController::class, 'index'])->name('index');
                Route::view('new', 'destination.create')->name('create');
                Route::post('', [DestinationController::class, 'store'])->name('store');

                Route::get('{id}', [DestinationController::class, 'show'])->name('show');

                Route::get('{id}/edit', [DestinationController::class, 'edit'])->name('edit');
                Route::patch('{id}', [DestinationController::class, 'update'])->name('update');

                Route::delete('{id}', [DestinationController::class, 'delete'])->name('delete');
            });
    });
});
