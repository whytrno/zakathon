<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\Muzakki;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    use ResponseTrait;

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->failedResponse('Email atau password salah!');
        }

        if ($user->role == 'muzakki') {
            $token = $user->createToken('auth_token')->plainTextToken;

            return $this->successResponse([
                'user' => $user,
                'token' => $token
            ], 'Login berhasil')->withCookie('auth_token', $token, 60);
        } else {
            return $this->failedResponse('Email atau password salah!');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'nik' => 'required|min:16|unique:users',
            'jenis' => 'required|in:perorangan,lembaga non upz,',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors());
        }

        $user = User::create($request->except('password_confirmation'));
        $user->muzakki()->create([
            'jenis' => $request->jenis,
            'npwz' => rand(100000000000, 999999999999)
        ]);

        return $this->successResponse($user, 'Registrasi berhasil');
    }

    public function profile()
    {
        $id = auth()->user()->id;
        $user = User::with('muzakki')->findOrFail($id);

        return $this->successResponse($user);
    }

    public function updateProfile(Request $request)
    {
        $id = auth()->user()->id;
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $id,
            'nik' => 'nullable|string|min:16|unique:users,nik,' . $id,
            'jenis' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'nullable|in:laki laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'password' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return $this->failedResponse($validator->errors());
        }
        
        if ($request->password == '' | $request->password == null) {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }

        $muzakki = Muzakki::where('user_id', $id)->first();

        if (is_null($muzakki)) {
            Muzakki::create([
                'user_id' => $id,
                'npwz' => rand(100000000000, 999999999999),
                'jenis' => $request->jenis,
            ]);
        } else {
            $muzakki->update([
                'jenis' => $request->jenis,
            ]);
        }

        return $this->successResponse($user, "Profile berhasil di perbaharui");
    }
}
