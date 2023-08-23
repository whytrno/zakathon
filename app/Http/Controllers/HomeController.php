<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.index');
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function history()
    {
        return view('home.history');
    }
    public function editProfile()
    {
        return view('home.edit-profile');
    }

    public function updateProfile(Request $request){
        // dd($request->all());


        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,'.$auth->id,
            'nik' => 'nullable|string|min:16|unique:users,nik,'.$auth->id,
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'password' => 'nullable|string',
        ]);
        if($request->password == '' | $request->password == null){
            $user->update($request->only('nama','email','nik','jenis_kelamin','telepon'));
        }else{
            $user->update($request->only('nama','email','nik','jenis_kelamin','telepon','password'));

        }

        $user->muzakki->update([
            'jenis' => $request->jenis,
        ]);
        return redirect()->back()->with('success','Berhasil mengubah data');

    }
}
