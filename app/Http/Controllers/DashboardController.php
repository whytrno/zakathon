<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function rekap($jenis, $bulan, $tahun)
    {
        $data = [];

        if ($jenis == 'pendistribusian') {
            $data = Pendistribusian::where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->with('detail')
                ->get();
        }

        dd($data);

        return view('dashboard.rekap', compact('jenis', 'bulan', 'tahun'));
    }
}
