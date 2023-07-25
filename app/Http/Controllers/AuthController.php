<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function loginindex()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validate the user
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8|max:255'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        ;
        // Check if the user exists
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $request->input('remember'))) {
            // If the user exists, redirect to home page
            return redirect('/');
        } else {
            // If the user doesn't exist, redirect to login page
            return redirect()->back()->with('error', 'Invalid email or password')->withInput();
        }
    }
    public function registerindex()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the user
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        ;
        // Create a new user
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        // Save the user
        $user->save();

        // Login the user after successful registration
        Auth::login($user);

        // Redirect to home page
        return redirect('/');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
