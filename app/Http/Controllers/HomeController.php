<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\BookRequest;
use App\Models\City;
use App\Models\Collection;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

  public function showHome()
  {
    $authUser = auth()->user();

    $authors = Author::where('status', 1)->get();
    $collections = Collection::where('status', 1)->get();
    $cities = City::where('status', 1)->get();

    $latest_books = Book::orderByDesc('id')
      ->addSelect(['distance' => User::select(\DB::raw("ST_Distance_Sphere(
        POINT($authUser->longitude, $authUser->latitude), POINT(longitude, latitude))"))
        ->whereColumn('id', 'books.owner_id')
        ->limit(1)
      ])
      ->get()
      ->take(5);

    $popular_books = Book::orderBy('id')
      ->addSelect(['distance' => User::select(\DB::raw("ST_Distance_Sphere(
        POINT($authUser->longitude, $authUser->latitude), POINT(longitude, latitude))"))
        ->whereColumn('id', 'books.owner_id')
        ->limit(1)
      ])
      ->get()
      ->take(5);

    $popular_authors = Author::where('status', 1)->get()->take(5);
    $popular_collections = Collection::where('status', 1)->get()->take(5);

    return view('visitor.home', compact('authors', 'collections', 'cities', 'popular_books', 'latest_books', 'popular_authors', 'popular_collections'));
  }


}
