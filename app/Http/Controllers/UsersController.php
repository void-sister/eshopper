<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        return view('my-profile')->with('user', auth()->user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.auth()->id(),
            'password' => 'sometimes|nullable|string|min:6|confirmed',
            'address' => 'string|max:255',
            'city' => 'string|max:255',
            'phone' => 'min:12|numeric',
        ]);

        $user = auth()->user();
        $input = $request->except('password', 'password_confirmation');

        if (! $request->filled('password')) {
          $user->fill($input)->save();

          return back()->with('success_message', 'Profile updated successfully!');
        }

        $user->password = bcrypt($request->password);
        $user->fill($input)->save();

        return back()->with('success_message', 'Profile (and password) updated successfully!');
    }
}
