<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
use Illuminate\Support\Facades\DB;

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

    public function forgotpasswordindex(){
        return view('auth.forgot-password');
    }

    public function forgotpassword(Request $request){
        // Validate the user
        $validator = Validator::make($request->all(), [
            'email' => 'required|email'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check if the user exists
        $user = User::where('email', $request->input('email'))->first();
        if ($user) {
            $existingToken = DB::table('password_reset_tokens')->where('email', $user->email)->first();
            if ($existingToken) {
                DB::table('password_reset_tokens')->where('email', $user->email)->update(['created_at' => now()]);
                return redirect()->back()->with('success', 'Password reset link already sent to your email');
            }
            $token = Str::random(64);
            DB::table('password_reset_tokens')->insert([
                'email' => $user->email,
                'token' => $token,
                'created_at' => now()
            ]);
            Mail::to($user->email)->send(new ForgotPassword($user, $token));
            return redirect()->back()->with('success', 'Password reset link sent to your email');
        } else {
            return redirect()->back()->with('error', 'User with this email does not exist')->withInput();
        }
    }

    public function resetpasswordindex($token){
        $user = DB::table('password_reset_tokens')->where('token', $token)->first();
        return view('auth.reset-password', ['user' => $user, 'token' => $token]);
    }

    public function resetpassword(Request $request)
    {
        // Validate the user input
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Check if the user exists
        $user = DB::table('password_reset_tokens')->where('token', $request->input('token'))->first();

        if ($user) {
            // Retrieve the corresponding user from the users table
            $userData = DB::table('users')->where('email', $user->email)->first();

            if ($userData) {
                // Check if the provided email matches the user's email associated with the token
                if ($userData->email === $request->input('email')) {
                    // Update the user's password
                    DB::table('users')->where('email', $user->email)->update(['password' => Hash::make($request->input('password'))]);

                    // Delete the token from the password_reset_tokens table
                    DB::table('password_reset_tokens')->where('token', $request->input('token'))->delete();

                    return redirect()->route('login')->with('success', 'Password reset successful');
                } else {
                    // Email provided does not match the user's email associated with the token
                    return redirect()->back()->with('error', 'Invalid email')->withInput();
                }
            } else {
                // User with the associated email not found
                return redirect()->back()->with('error', 'User not found for the token')->withInput();
            }
        } else {
            // Invalid token
            return redirect()->back()->with('error', 'Invalid token')->withInput();
        }
    }

}
