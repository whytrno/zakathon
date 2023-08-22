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
        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->intended('/');
        }

        return redirect()->back()->with('error', 'Email atau password salah!');
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