<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class ProfileControlller extends Controller
{
    public function index()
    {
        //
    }

    public function show($id)
    {
    }

    public function edit()
    {
      $user = auth()->user();
      $cities = City::where('status', 1)->orderBy('name')->get();
      return view('member.profiles.edit', compact('user', 'cities'));
    }

    public function update(Request $request)
    {
      $user = auth()->user();

      $attributes = $request->validate([
        'name' => 'required|string',
        'date_of_birth' => 'nullable|date',
        'gender' => 'nullable|in:MALE,FEMALE,OTHER',
        'profession' => 'nullable|in:AUTHOR,STUDENT,OTHER',
        'phone' => 'nullable|numeric',
        'email' => 'required|email|unique:users,email,'.$user->id,
        'city_id' => 'nullable|exists:cities,id',
        'address' => 'nullable|string',
        'avatar' => 'nullable|image'
      ]);

      $user->update($attributes);
      return back();

      return $request->all();
    }

    public function destroy($id)
    {
        //
    }

    public function authUserProfile()
    {
      $user = auth()->user();
      return view('member.profiles.show', compact('user'));
    }
}
