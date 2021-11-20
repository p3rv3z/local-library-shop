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
    $books = Book::with(['category', 'author', 'owner'])
      ->whereHas('owner', function($query){
        $query->where('owner_id', auth()->id());
      })->paginate(2);

//    return $books;
    return view('member.books.index', compact('books'));
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
      'title' => ['required', 'string'],
      'description' => ['required', 'string'],
      'isbn' => ['nullable', 'string'],
      'edition' => ['nullable', 'string'],
      'pages' => ['required'],
      'price' => ['required'],
      'is_free' => ['required', 'boolean'],
      'is_lendable' => ['required', 'boolean'],
      'is_sellable' => ['required', 'boolean'],
//      'status' => ['required', 'boolean'],
      'author_id' => ['required', 'exists:authors,id'],
//      'publisher_id' => ['required', 'exists:publishers,id'],
      'collection_id' => ['required', 'exists:collections,id'],
      'book_cover' => ['nullable', 'image'],
      'sample_pdf' => ['nullable', 'file']
    ]);
//    $payload['slug'] = Str::slug($payload['name']);
// missings book owner

//    return $payload;
    $authId = auth()->id();

    $payload['owner_id'] = $authId;
    $book = Book::create($payload);

    if ($request->hasFile('book_cover')) {
      $book
        ->addMediaFromRequest('book_cover')
        ->usingFileName($this->getUniqueFileName('book_cover'))
        ->toMediaCollection('book-covers');
    }

    if ($request->hasFile('sample_pdf')) {
      $book
        ->addMediaFromRequest('sample_pdf')
        ->usingFileName($this->getUniqueFileName('sample_pdf'))
        ->toMediaCollection('book-sample-pdfs');
    }

    return redirect()->route('member.books.index');
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

  public function edit(Book $book)
  {
    $authors = Author::where('status', 1)->get();
    $collections = Collection::where('status', 1)->get();
    return view('member.books.edit', compact('book', 'authors', 'collections'));
  }

  public function update(Request $request, Book $book)
  {
    $payload = $request->validate([
      'title' => ['required', 'string'],
      'description' => ['required', 'string'],
      'isbn' => ['nullable', 'string'],
      'edition' => ['nullable', 'string'],
      'pages' => ['required'],
      'price' => ['required'],
      'is_free' => ['required', 'boolean'],
      'is_lendable' => ['required', 'boolean'],
      'is_sellable' => ['required', 'boolean'],
//      'status' => ['required', 'boolean'],
      'author_id' => ['required', 'exists:authors,id'],
//      'publisher_id' => ['required', 'exists:publishers,id'],
      'collection_id' => ['required', 'exists:collections,id'],
      'book_cover' => ['nullable', 'image'],
      'sample_pdf' => ['nullable', 'file']
    ]);

    $authId = auth()->id();

    $payload['owner_id'] = $authId;
    $book->update($payload);

    if ($request->hasFile('book_cover')) {
      $book
        ->addMediaFromRequest('book_cover')
        ->usingFileName($this->getUniqueFileName('book_cover'))
        ->toMediaCollection('book-covers');
    }

    if ($request->hasFile('sample_pdf')) {
      $book
        ->addMediaFromRequest('sample_pdf')
        ->usingFileName($this->getUniqueFileName('sample_pdf'))
        ->toMediaCollection('book-sample-pdfs');
    }

    return redirect()->route('member.books.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param \App\Models\Book $book
   * @return \Illuminate\Http\Response
   */
  public function destroy(Book $book)
  {
    $book->delete();
    return back();
  }
}
