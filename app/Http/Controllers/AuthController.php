<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginProcess(Request $request)
    {
        $user = User::where('email', $request->email)->with(['muzakki'])->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        // if $user->muzakki is null, then it redirect to /dashboard if $user->muzakki not null then redirect to /home
        if ($user->muzakki) {
            auth()->login($user);

            return redirect()->intended('/home');
        } else {
            auth()->login($user);

            return redirect()->intended('/dashboard');
        }

        // if (auth()->attempt($request->only('email', 'password'))) {
        //     return redirect()->intended('/');
        // }

        // return redirect()->back()->with('error', 'Email atau password salah!');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        User::create($request->except('password_confirmation'));

        return redirect()->route('login');
    }

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function codeVerification()
    {
        return view('auth.code-verification');
    }
}