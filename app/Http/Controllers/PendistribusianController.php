<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PendistribusianController extends Controller
{
    public $bulan;

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
    }

    public function bulanToString($bulan)
    {
        $bulan = (int)$bulan;
        $bulan = $this->bulan[$bulan];
        return $bulan;
    }

    public function index()
    {
        $datas = Pendistribusian::with(['detail'])->get();

        foreach ($datas as $data) {
            $data->bulan = $this->bulanToString($data->bulan);
        }

//        <p class="py-1 px-3 bg-purple-200 text-black/70 rounded-xl font-semibold">Belum Diajukan</p>
//                        <p class="py-1 px-3 bg-blue-200 text-black/70 rounded-xl font-semibold">Diajukan</p>
//                        <p class="py-1 px-3 bg-green-200 text-black/70 rounded-xl font-semibold">Disetujui</p>
//                        <p class="py-1 px-3 bg-red-200 text-black/70 rounded-xl font-semibold">Revisi</p>

        return view('dashboard.pendistribusian.index', compact('datas'));
    }

    public function create()
    {
        $bulan = $this->bulan;
        return view('dashboard.pendistribusian.create', compact('bulan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            "program" => "required",
            "bulan" => "required|numeric",
            "tahun" => "required|numeric|digits:4",
            "target_fakir" => "required|numeric",
            "target_miskin" => "required|numeric",
            "target_amil" => "required|numeric",
            "target_muallaf" => "required|numeric",
            "target_riqob" => "required|numeric",
            "target_gharim" => "required|numeric",
            "target_fisabilillah" => "required|numeric",
            "target_ibnu_sabil" => "required|numeric",
        ]);

        Pendistribusian::create($request->all());

        return redirect()->route('pendistribusian.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = Pendistribusian::findOrFail($id);
        $bulan = $this->bulan;

        return view('dashboard.pendistribusian.edit', compact('data', 'bulan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            "program" => "required",
            "bulan" => "required|numeric",
            "tahun" => "required|numeric|digits:4",
            "target_fakir" => "required|numeric",
            "target_miskin" => "required|numeric",
            "target_amil" => "required|numeric",
            "target_muallaf" => "required|numeric",
            "target_riqob" => "required|numeric",
            "target_gharim" => "required|numeric",
            "target_fisabilillah" => "required|numeric",
            "target_ibnu_sabil" => "required|numeric",
        ]);

        $data = Pendistribusian::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('pendistribusian.index')->with('success', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = Pendistribusian::findOrFail($id);
        $data->detail()->delete();
        $data->delete();

        return redirect()->route('pendistribusian.index')->with('success', 'Data berhasil dihapus');
    }
}
