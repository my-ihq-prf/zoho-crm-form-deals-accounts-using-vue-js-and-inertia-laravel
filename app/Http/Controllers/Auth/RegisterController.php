<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function showRegisterForm()
    {
        return Inertia::render('Auth/Register');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:4']
        ]);

        $user = new User();
        $user->name = $request->input("name");
        $user->email = $request->input("email");
        $user->password = Hash::make($request->input("password"));
        $user->save();

        $request->session()->flash('success', 'User registered successfully! you can sign in now');

        return Redirect::route('showLoginForm');
    }
}
