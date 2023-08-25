<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use Illuminate\Http\Request;

class MustahiqController extends Controller
{
    public function index()
    {
        $datas = Mustahiq::with('user')->get();

        return view('dashboard.mustahiq.index', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.mustahiq.create');
    }

    public function edit($id)
    {
        $data = Mustahiq::with('user')->findOrFail($id);

        return view('dashboard.mustahiq.edit', compact('data'));
    }

    public function store(Request $request)
    {
        $request['role'] = 'muzakki';

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'nik' => 'nullable|string|min:16|unique:users,nik',
            'jenis_kelamin' => 'nullable|in:laki laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'alamat' => 'nullable|string',
            'nama_pimpinan' => 'nullable|string',
            'nik_pimpinan' => 'nullable|string|min:16|unique:users,nik_pimpinan',
            'nama_cp' => 'nullable|string',
            'telp_cp' => 'nullable|string|min:10',
            'jenis' => 'nullable|in:perorangan,lembaga non upz,lembaga upz',
            'password' => 'required|min:8',
        ]);

        $user = User::create($request->all());

        Mustahiq::create([
            'user_id' => $user->id,
            'npwz' => rand(100000000000, 999999999999),
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('mustahiq.index')->with('success', 'Berhasil menambahkan data');
    }

    public function update(Request $request, $id)
    {
        $muzakki = Mustahiq::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'nullable|string|min:16|unique:users,nik,' . $muzakki->user_id,
            'jenis_kelamin' => 'nullable|in:laki laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'alamat' => 'nullable|string',
            'nama_pimpinan' => 'nullable|string',
            'nik_pimpinan' => 'nullable|string|min:16|unique:users,nik_pimpinan,' . $muzakki->user_id,
            'nama_cp' => 'nullable|string',
            'telp_cp' => 'nullable|string|min:10',
            'jenis' => 'nullable|in:perorangan,lembaga non upz,lembaga upz',
            'password' => 'nullable|min:8',
        ]);

        $user = User::findOrFail($muzakki->user_id);

        if ($request->password == '' | $request->password == null) {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }

        $user->muzakki->update([
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('mustahiq.index')->with('success', 'Berhasil mengubah data');
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