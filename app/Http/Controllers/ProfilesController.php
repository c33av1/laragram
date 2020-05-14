<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfilesController extends Controller
{
    public function index($user)
    {
        $userProfile = User::findOrFail($user);

        return view('profile.index', [
            'user' => $userProfile,
        ]);
    }

    public function edit(\App\User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {


        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);

        Auth()->user()->profile->update($data);
        return redirect("/profile/{$user->id}");
    }
}
