<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
use App\Models\User;
use Illuminate\Http\Request;

class MuzakkiController extends Controller
{
    public function index()
    {
        $datas = Muzakki::with('user')->get();

        return view('dashboard.muzakki.index', compact('datas'));
    }

    public function store(Request $request)
    {
        $request['role'] = 'muzakki';

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nik' => 'required|string|min:16|unique:users,nik',
            'jenis_kelamin' => 'required|in:laki laki,perempuan',
            'telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
            'jenis' => 'required|in:perorangan,lembaga non upz,lembaga upz',
            'password' => 'required|min:8',
        ]);

        $user = User::create($request->only('nama', 'role', 'email', 'password', 'nik', 'jenis_kelamin', 'telepon', 'alamat'));

        Muzakki::create([
            'user_id' => $user->id,
            'npwz' => rand(100000000000, 999999999999),
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'nik' => 'required|string|min:16|unique:users,nik,' . $id,
            'jenis_kelamin' => 'required|in:laki laki,perempuan',
            'telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
            'jenis' => 'required|in:perorangan,lembaga non upz,lembaga upz',
        ]);

        $user = User::findOrFail($request->id);

        if ($request->password == '' | $request->password == null) {
            $user->update($request->only('nama', 'nik', 'jenis_kelamin', 'telepon', 'alamat'));
        } else {
            $user->update($request->only('nama', 'nik', 'jenis_kelamin', 'telepon', 'alamat', 'password'));
        }

        $user->muzakki->update([
            'jenis' => $request->jenis,
        ]);

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);

        if ($data->muzakki) {
            $data->muzakki->delete();
        }

        $data->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}