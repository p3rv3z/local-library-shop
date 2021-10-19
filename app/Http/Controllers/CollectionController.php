<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CollectionController extends Controller
{
  public function index()
  {
    $this->checkPermission(['collections.create', 'collections.edit', 'collections.delete']);

    $collections = Collection::orderBy('name')->paginate($this->itemPerPage);
    $this->putSL($collections);

    return view('admin.collections.index', compact('collections'));
  }

  public function create()
  {
    $this->checkPermission('collections.create');

    return view('admin.collections.create');
  }

  public function store(Request $request)
  {
    $this->checkPermission('collections.create');
    $payload = $request->validate([
      'name' => ['required', 'unique:collections,name', 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

    $payload['slug'] = Str::slug($payload['name']);

    Collection::create($payload);
    return back()->with('success', __('Collection successfully created.'));
  }

  public function edit(Collection $collection)
  {
    $this->checkPermission('collections.edit');

    return view('admin.collections.edit', compact('collection'));
  }

  public function update(Request $request, Collection $collection)
  {
    $this->checkPermission('collections.edit');

    $payload = $request->validate([
      'name' => ['required', 'unique:collections,name,'.$collection->id, 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

    $payload['slug'] = Str::slug($payload['name']);

    $collection->update($payload);
    return back()->with('success', __('Collection successfully updated.'));
  }

  public function destroy(Collection $collection)
  {
    $this->checkPermission('collections.delete');

    $collection->delete();
    return back()->with('success', __('Collection successfully deleted.'));
  }
}
