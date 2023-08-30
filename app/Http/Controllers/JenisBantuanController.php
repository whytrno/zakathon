<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use App\Models\PermohonanBantuan;
use Illuminate\Http\Request;

class JenisBantuanController extends Controller
{
    public function index($jenis)
    {
        $datas = PermohonanBantuan::where('jenis_bantuan', $jenis)->get();

        foreach ($datas as $data) {
            $data->jenis_bantuan = ucwords(str_replace('_', ' ', $data->jenis_bantuan));
        }

        return view('dashboard.pengajuan-bantuan.index', compact('datas', 'jenis'));
    }

    public function detail($jenis, $id)
    {
        $data = PermohonanBantuan::findOrFail($id);

        $data->jenis_bantuan = ucwords(str_replace('_', ' ', $data->jenis_bantuan));
        $files = json_decode($data->file);

        
        return view('dashboard.pengajuan-bantuan.detail', compact('data', 'jenis', 'files'));
    }

    public function changeStatus($jenis, $id, $type)
    {
        $data = PermohonanBantuan::findOrFail($id);
        $data->status = $type;
        $data->save();

        return redirect()->route('pengajuan-bantuan.index', compact('jenis'))->with('success', 'Status berhasil diubah');
    }
}
