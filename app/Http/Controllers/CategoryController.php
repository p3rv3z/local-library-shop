<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
  public function index()
  {
    $this->checkPermission(['categories.create', 'categories.edit', 'categories.delete']);

    $categories = Category::orderBy('name')->paginate($this->itemPerPage);
    $this->putSL($categories);

    return view('admin.categories.index', compact('categories'));
  }

  public function create()
  {
    $this->checkPermission('categories.create');

    return view('admin.categories.create');
  }

  public function store(Request $request)
  {
    $this->checkPermission('categories.create');
    $payload = $request->validate([
      'name' => ['required', 'unique:categories,name', 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

    $payload['slug'] = Str::slug($payload['name']);

    Category::create($payload);
    return back()->with('success', __('Category successfully created.'));
  }

  public function edit(Category $category)
  {
    $this->checkPermission('categories.edit');

    return view('admin.categories.edit', compact('collection'));
  }

  public function update(Request $request, Category $category)
  {
    $this->checkPermission('categories.edit');

    $payload = $request->validate([
      'name' => ['required', 'unique:categories,name,'.$category->id, 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

    $payload['slug'] = Str::slug($payload['name']);

    $category->update($payload);
    return back()->with('success', __('Category successfully updated.'));
  }

  public function destroy(Category $category)
  {
    $this->checkPermission('categories.delete');

    $collection->delete();
    return back()->with('success', __('Category successfully deleted.'));
  }
}
