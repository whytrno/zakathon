<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengumpulan;
use App\Models\Muzakki;


class PengumpulanController extends Controller
{
    public $bulan, $jenis_dana;

    public function __construct()
    {
        $this->bulan = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'Nopember',
            12 => 'Desember',
        ];

        $this->jenis_dana = [
            1 => 'zakat',
            2 => 'infak/sedekah tidak terikat',
            3 => 'infak/sedekah terikat',
            4 => 'dskl',
            5 => 'csr',
            6 => 'zakat fitrah',
        ];
    }

    public function index()
    {
        $datas = Pengumpulan::all();

        return view('dashboard.pengumpulan.index', compact('datas'));
    }

    public function create()
    {
        $bulan = $this->bulan;
        $jenis_dana = $this->jenis_dana;

        return view('dashboard.pengumpulan.create', compact('bulan', 'jenis_dana'));
    }

    public function edit($id)
    {
        $bulan = $this->bulan;
        $jenis_dana = $this->jenis_dana;

        $data = Pengumpulan::findOrFail($id);

        return view('dashboard.pengumpulan.edit', compact('id', 'data', 'bulan', 'jenis_dana'));
    }

    public function changeStatus($id, $type)
    {
        $data = Pengumpulan::findOrFail($id);
        $data->status = $type;
        $data->save();

        return redirect()->route('pengumpulan.index')->with('success', 'Status berhasil diubah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'target_zakat' => 'required',
            'target_infak' => 'required',
            'target_csr' => 'required',
            'target_dskl' => 'required',
        ]);

        Pengumpulan::create($request->all());

        return redirect()->route('pengumpulan.index')
            ->with('success', 'Pengumpulan created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bulan' => 'required',
            'tahun' => 'required',
            'target_zakat' => 'required',
            'target_infak' => 'required',
            'target_csr' => 'required',
            'target_dskl' => 'required',
        ]);

        $data = Pengumpulan::findOrFail($id);

        $data->update($request->all());

        return redirect()->route('pengumpulan.index')
            ->with('success', 'Pengumpulan updated successfully.');
    }
}

