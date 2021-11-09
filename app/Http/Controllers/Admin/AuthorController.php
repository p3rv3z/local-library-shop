<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
  public function index()
  {
    $this->checkPermission(['authors.create', 'authors.edit', 'authors.delete']);

    $authors = Author::orderBy('name')->paginate($this->itemPerPage);
    $this->putSL($authors);

    return view('admin.authors.index', compact('authors'));
  }

  public function create()
  {
    $this->checkPermission('authors.create');

    return view('admin.authors.create');
  }

  public function store(Request $request)
  {
    $this->checkPermission('authors.create');
    $payload = $request->validate([
      'name' => ['required', 'unique:authors,name', 'max:50'],
      'description' => ['required', 'string'],
      'status' => ['required', 'boolean'],
    ]);

//    $payload['slug'] = Str::slug($payload['name']);

    Author::create($payload);
    return back()->with('success', __('Author successfully created.'));
  }

  public function edit(Author $author)
  {
    $this->checkPermission('authors.edit');

    return view('admin.authors.edit', compact('author'));
  }

  public function update(Request $request, Author $author)
  {
    $this->checkPermission('authors.edit');

    $payload = $request->validate([
      'name' => ['required', 'unique:authors,name,'.$author->id, 'max:50'],
      'description' => ['required', 'string'],
      'status' => ['required', 'boolean'],
    ]);

//    $payload['slug'] = Str::slug($payload['name']);

    $author->update($payload);
    return back()->with('success', __('Author successfully updated.'));
  }

  public function destroy(Author $author)
  {
    $this->checkPermission('authors.delete');

    $author->delete();
    return back()->with('success', __('Author successfully deleted.'));
  }
}
