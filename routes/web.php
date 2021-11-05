<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')
  ->middleware('auth')
  ->as('admin.')
  ->group(function () {

    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('collections', CollectionController::class)->except('show');
  });

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::as('visitor.')
  ->group(function () {
    Route::view('/', 'visitor.home')->name('home');
//    Route::resource('collections', CollectionController::class)->except('show');
});
