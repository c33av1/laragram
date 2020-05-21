<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;

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
        $this->authorize('update', $user->profile); // check with the profile policy

        return view('profile.edit', compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => ''
        ]);



        if (request('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            $image->save();

            $data['image'] = $imagePath;
        }

        Auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");
    }
}
