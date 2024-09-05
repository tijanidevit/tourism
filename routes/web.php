<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest')->name('login');

Route::post('login', [AuthController::class, 'login'])->middleware('guest')->name('login.post');
Route::view('register', 'register')->middleware('guest')->name('register');
Route::post('register', [AuthController::class, 'register'])->middleware('guest')->name('register.post');


Route::middleware('auth')->group(function () {
    Route::get('dashboard', DashboardController::class)->name('home');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::as('user.')->prefix('users')->group(function(){
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::get('{id}', [UserController::class, 'show'])->name('show');
    });

    Route::as('destination.')->prefix('destinations')->group(function(){
        Route::get('', [DestinationController::class, 'index'])->name('index');
        Route::view('new', 'destination.create')->name('create');
        Route::post('', [DestinationController::class, 'store'])->name('store');

        Route::get('{id}', [DestinationController::class, 'show'])->name('show');

        Route::get('{id}/edit', [DestinationController::class, 'edit'])->name('edit');
        Route::patch('{id}', [DestinationController::class, 'update'])->name('update');

        Route::delete('{id}', [DestinationController::class, 'delete'])->name('delete');
    });

    include __DIR__.'/app.php';
});
