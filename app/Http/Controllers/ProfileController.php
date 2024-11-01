<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile) {
        return view('profile.edit', ['user' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $profile) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $profile->id,
            'password' => [
                'nullable',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[@$!%*?&]/',
                'confirmed',
                function ($attribute, $value, $fail) use ($profile) {
                    if (Hash::check($value, $profile->password)) {
                        $fail('The new password must not be the same as the previous password.');
                    }
                }
            ],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ], [
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must include at least one uppercase letter, one number, and one special character.',
            'password.confirmed' => 'The password and confirm password does not match.',
        ]);

        $profile->name = $validatedData['name'];
        $profile->email = $validatedData['email'];

        if ($request->filled('password')) {
            $profile->password = Hash::make($validatedData['password']);
        }

        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'private');
            $profile->avatar = $avatarPath;
        }

        $profile->save();

        return redirect()->route('profile.edit', $profile)->with('success', 'Profile Updated.');
    }
}
