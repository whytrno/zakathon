<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
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
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }

        if ($user->role == 'muzakki') {
            auth()->attempt($request->only('email', 'password'));

            return redirect()->intended('/home');
        } else if ($user->role == 'admin') {
            auth()->attempt($request->only('email', 'password'));

            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email atau password salah!');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'nik' => 'required|string|unique:users',
        ]);

        $user = User::create($request->except('password_confirmation'));
        Muzakki::create([
            'user_id' => $user->id,
            'jenis' => $request->jenis,
            'npwz' => rand(100000000000, 999999999999)
        ]);

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
