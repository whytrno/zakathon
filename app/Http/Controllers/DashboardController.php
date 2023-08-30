<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Pendistribusian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
//        return view('dashboard.index');
        return redirect()->route('pengumpulan.index');
    }

    public function getKabupatenJson($query)
    {
        $datas = Kabupaten::where('nama', 'like', "%$query%")
            ->get();

        return response()->json($datas);
    }

    public function petaPendistribusian()
    {
        $activeKabupaten = [];

        $pendistribusian = Pendistribusian::with(['kabupaten'])
            ->where('bulan', date('m'))
            ->where('tahun', date('Y'))
            ->get();

        foreach ($pendistribusian as $value) {
            $found = false;

            // Iterasi melalui $activeKabupaten untuk mencari kabupaten yang sama
            foreach ($activeKabupaten as &$kabupatenData) {
                if ($kabupatenData[0] === $value->kabupaten->nama) {
                    // Jika nama kabupaten sudah ada, tambahkan data baru
                    $kabupatenData[1] += $value->totalTarget();
                    $kabupatenData[2] += $value->totalRealisasi();
                    // Perhitungan persentase baru
                    $kabupatenData[3] = ($kabupatenData[2] / $kabupatenData[1]) * 100;
                    $kabupatenData[4] += 1;
                    $found = true;
                    break;
                }
            }

            // Jika nama kabupaten tidak ditemukan, tambahkan baru ke dalam $activeKabupaten
            if (!$found) {
                $activeKabupaten[] = [
                    $value->kabupaten->nama,
                    $value->totalTarget(),
                    $value->totalRealisasi(),
                    $value->persenRealisasi(),
                    1,
                ];
            }
        }

// Reset array index
        $activeKabupaten = array_values($activeKabupaten);

        return view('dashboard.peta', compact('activeKabupaten'));
    }
}
