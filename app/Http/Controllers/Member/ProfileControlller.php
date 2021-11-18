<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
      $user = Auth::user();
      $cities = City::where('status', 1)->orderBy('name')->get();
      return view('member.profiles.edit', compact('user', 'cities'));
    }

    public function update(Request $request)
    {
      $user = Auth::user();

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

      if ($request->hasFile('avatar')) {
        $user
          ->addMediaFromRequest('avatar')
          ->usingFileName($this->getUniqueFileName('avatar'))
          ->toMediaCollection('user-avatars');
      }
      return back();

      return $request->all();
    }

    public function destroy($id)
    {
        //
    }

    public function authUserProfile()
    {
      $user = Auth::user();
      return view('member.profiles.show', compact('user'));
    }

    public function getProfileSettings()
    {
      $user = Auth::user();
      return view('member.profiles.settings', compact('user'));
    }

    public function changePassword(Request $request)
    {
      $request->validate([
        'current_password' => 'required',
        'new_password' => 'required|min:8|confirmed',
      ]);

      $user = Auth::user();
      $userPassword = $user->password;

      if (!Hash::check($request->input('current_password'), $userPassword)) {
        return back()->withErrors(['current_password'=>'Invalid password given']);
      }

      $user->password = Hash::make($request->input('new_password'));
      $user->save();

      return back();
    }

    public function setLocation(Request $request)
    {
      $attributes = $request->validate([
        'latitude' => 'required|numeric|between:-90,90',
        'longitude' => 'required|numeric|between:-180,180'
      ]);

      $user = Auth::user();
      $user->update($attributes);

      return back();
    }

}
