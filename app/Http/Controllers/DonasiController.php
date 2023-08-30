<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Mustahiq;
use App\Models\Pendistribusian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonasiController extends Controller
{
    public function index()
    {
        $datas = Donasi::all();

        return view('dashboard.donasi.index', compact('datas'));
    }

    public function create()
    {
        return view('dashboard.donasi.create');
    }

    public function edit($id)
    {
        $data = Donasi::findOrFail($id);

        return view('dashboard.donasi.edit', compact('data', 'id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required',
            'target_donasi' => 'required|numeric',
            'banner_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('banner_file')) {
            $banner_file = $request->file('banner_file');
            $banner_file_name = time() . '.' . $banner_file->extension();
            $banner_file->move(public_path('uploads/donasi/'), $banner_file_name);

            $request->merge([
                'banner' => $banner_file_name,
            ]);
        }

        Donasi::create($request->all());

        return redirect()->route('donasi.index')->with('success', 'Berhasil menambahkan data');
    }

    public function detail($id)
    {
        $datas = Donasi::with('transaksi.donatur')->findOrFail($id);

        return view('dashboard.donasi.detail', compact('datas', 'id'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi_singkat' => 'required',
            'target_donasi' => 'required|numeric',
            'banner_file' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = Donasi::findOrFail($id);

        if ($request->hasFile('banner_file')) {
            $file_path = public_path('uploads/donasi/' . $data->banner);
            if (!is_null($data->banner) && file_exists($file_path)) {
                unlink($file_path);
            }

            $banner_file = $request->file('banner_file');
            $banner_file_name = time() . '.' . $banner_file->extension();
            $banner_file->move(public_path('uploads/donasi/'), $banner_file_name);

            $request->merge([
                'banner' => $banner_file_name,
            ]);
        }

        $data->update($request->all());

        return redirect()->route('donasi.index')->with('success', 'Berhasil mengubah data');
    }

    public function changeStatus($id, $type)
    {
        $data = Donasi::findOrFail($id);
        $data->status = $type;
        $data->save();

        return redirect()->route('donasi.index')->with('success', 'Status berhasil diubah');
    }

    public function destroy($id)
    {
        $data = Donasi::findOrFail($id);

        if ($data->donatur) {
            $data->donatur->delete();
        }

        $data->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
