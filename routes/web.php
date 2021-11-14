<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\BookController;
use App\Http\Controllers\Member\ProfileControlller;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')
  ->middleware('auth')
  ->as('admin.')
  ->group(function () {

    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('collections', CollectionController::class)->except('show');
    Route::resource('authors', AuthorController::class)->except('show');
    Route::resource('cities', CityController::class)->except('show');
  });

//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::as('visitor.')
  ->group(function () {
    Route::view('/', 'visitor.home')->name('home');
  });

Route::middleware('auth')->as('member.')->group(function() {
  Route::get('member/profile', [ProfileControlller::class, 'authUserProfile'])->name('profile');
  Route::get('member/profile/edit', [ProfileControlller::class, 'edit'])->name('profile.edit');
  Route::patch('member/profile/update', [ProfileControlller::class, 'update'])->name('profile.update');
  Route::get('member/profile/settings', [ProfileControlller::class, 'getProfileSettings'])->name('profile.settings.get');
  Route::patch('member/change/password', [ProfileControlller::class, 'changePassword'])->name('change.password');
  Route::patch('member/set/location', [ProfileControlller::class, 'setLocation'])->name('set.location');
  Route::resource('member/books', BookController::class);
});
