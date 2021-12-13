<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Member\BookController;
use App\Http\Controllers\Member\ProfileControlller;
use App\Http\Controllers\Member\RequestControlller;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::prefix('admin')
  ->middleware('auth')
  ->as('admin.')
  ->group(function () {

    Route::view('dashboard', 'admin.dashboard')->name('dashboard');
    Route::resource('categories', CategoryController::class)->except('show');
    Route::resource('authors', AuthorController::class)->except('show');
    Route::resource('cities', CityController::class)->except('show');
  });

Route::middleware('auth')
  ->as('member.')
  ->group(function() {
  Route::get('member/profile', [ProfileControlller::class, 'authUserProfile'])->name('profile');
  Route::get('member/profile/edit', [ProfileControlller::class, 'edit'])->name('profile.edit');
  Route::patch('member/profile/update', [ProfileControlller::class, 'update'])->name('profile.update');
  Route::get('member/profile/settings', [ProfileControlller::class, 'getProfileSettings'])->name('profile.settings.get');
  Route::patch('member/change/password', [ProfileControlller::class, 'changePassword'])->name('change.password');
  Route::patch('member/set/location', [ProfileControlller::class, 'setLocation'])->name('set.location');
  Route::resource('member/books', BookController::class);

  // requests
  Route::post('member/books/{book}/buy-request', [RequestControlller::class, 'sentBuyRequest'])->name('buy-request.create');
  Route::post('member/books/{book}/lend-request', [RequestControlller::class, 'sentLendRequest'])->name('lend-request.create');
  Route::post('member/books/requests/{bookRequest}/cancel', [RequestControlller::class, 'cancelRequest'])->name('request.cancel');
  Route::get('member/requests', [RequestControlller::class, 'showRequests'])->name('requests.index');
  Route::get('member/requests-by-type/{type}', [RequestControlller::class, 'showRequestsByType'])->name('requests-by-type.index');
    Route::post('member/books/requests/{bookRequest}/update', [RequestControlller::class, 'updateRequest'])->name('request.update');
});


//Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::as('visitor.')->middleware('auth:sanctum')
  ->group(function () {
    Route::get('/', [HomeController::class, 'showHome'])->name('home');
    Route::get('/books/{book}', [BookController::class, 'showBookDetails'])->name('show.book.details');
    Route::get('/categories/{category}/book', [BookController::class, 'booksByCategory'])->name('show.books.by.categories');
    Route::get('/authors/{author}/book', [BookController::class, 'booksByAuthor'])->name('show.books.by.authors');
    Route::get('/search', [BookController::class, 'bookSearch'])->name('search');
  });
