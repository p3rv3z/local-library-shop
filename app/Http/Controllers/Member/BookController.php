<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\City;
use App\Models\Collection;
use Illuminate\Http\Request;

class BookController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('member.books.index');
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $authors = Author::where('status', 1)->get();
    $collections = Collection::where('status', 1)->get();
    return view('member.books.create', compact('authors', 'collections'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
//    return $request;
//    $this->checkPermission('books.create');
    $payload = $request->validate([
      'title' => ['required', 'unique:books,title'],
      'description' => ['required', 'string'],
      'isbn' => ['required', 'string'],
      'edition' => ['required', 'string'],
      'pages' => ['required'],
      'price' => ['required'],
      'is_free' => ['required', 'boolean'],
      'is_lendable' => ['required', 'boolean'],
      'is_sellable' => ['required', 'boolean'],
      'author_id' => ['required', 'exists:authors,id'],
      'collection_id' => ['required', 'exists:collections,id'],
    ]);
//    $payload['slug'] = Str::slug($payload['name']);

    Book::create($payload);
    return back()->with('success', __('Book successfully created.'));
  }

  /**
   * Display the specified resource.
   *
   * @param \App\Models\Book $book
   * @return \Illuminate\Http\Response
   */
  public function show(Book $book)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param \App\Models\Book $book
   * @return \Illuminate\Http\Response
   */
  public function edit(Book $book)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param \App\Models\Book $book
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Book $book)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Book $book
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
    //
  }
}
