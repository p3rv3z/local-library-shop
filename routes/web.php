<?php

use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')
  ->middleware('auth')
  ->as('admin.')
  ->group(function () {

    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('collections', CollectionController::class)->except('show');
  });
