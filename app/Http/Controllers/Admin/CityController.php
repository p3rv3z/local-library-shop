<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
  public function index()
  {
    $this->checkPermission(['cities.create', 'cities.edit', 'cities.delete']);

    $cities = City::orderBy('name')->paginate($this->itemPerPage);
    $this->putSL($cities);

    return view('admin.cities.index', compact('cities'));
  }

  public function create()
  {
    $this->checkPermission('cities.create');

    return view('admin.cities.create');
  }

  public function store(Request $request)
  {
    $this->checkPermission('cities.create');
    $payload = $request->validate([
      'name' => ['required', 'unique:cities,name', 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

//    $payload['slug'] = Str::slug($payload['name']);

    City::create($payload);
    return back()->with('success', __('City successfully created.'));
  }

  public function edit(City $city)
  {
    $this->checkPermission('cities.edit');

    return view('admin.cities.edit', compact('city'));
  }

  public function update(Request $request, City $city)
  {
    $this->checkPermission('cities.edit');

    $payload = $request->validate([
      'name' => ['required', 'unique:cities,name,'.$city->id, 'max:50'],
      'status' => ['required', 'boolean'],
    ]);

//    $payload['slug'] = Str::slug($payload['name']);

    $city->update($payload);
    return back()->with('success', __('City successfully updated.'));
  }

  public function destroy(City $city)
  {
    $this->checkPermission('cities.delete');

    $city->delete();
    return back()->with('success', __('City successfully deleted.'));
  }
}
