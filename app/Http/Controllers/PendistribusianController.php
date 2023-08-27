<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PendistribusianController extends Controller
{
    public $bulan, $asnaf;

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

        $this->asnaf = [
            1 => 'fakir',
            2 => 'miskin',
            3 => 'amil',
            4 => 'muallaf',
            5 => 'riqob',
            6 => 'gharim',
            7 => 'fisabilillah',
            8 => 'ibnu sabil',
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
        $bulan = $this->bulan;

        foreach ($datas as $data) {
            $data->bulan = $this->bulanToString($data->bulan);
        }

        return view('dashboard.pendistribusian.index', compact('datas', 'bulan'));
    }

    public function changeStatus($id, $type)
    {
        $data = Pendistribusian::findOrFail($id);
        $data->status = $type;
        $data->save();

        return redirect()->route('pendistribusian.index')->with('success', 'Status berhasil diubah');
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

    public function rekap(Request $request)
    {
        $request->validate([
            'tahun' => 'required|numeric|digits:4',
        ]);

        $dataPerProgram = Pendistribusian::where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->with(['detail.mustahiq.user'])
            ->get();

        if (is_null($dataPerProgram)) {
            return redirect()->route('pendistribusian.index')->with('error', 'Data tidak ditemukan');
        }

        $dataPerAsnaf = [
            "asnaf" => [
                [
                    "name" => "Fakir",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Miskin",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Amil",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Muallaf",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Riqob",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Gharim",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Fisabilillah",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "Ibnu Sabil",
                    "target" => 0,
                    "vol" => [0, 0],
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
            ],
            "jumlah" => [
                "target" => 0,
                "vol" => [0, 0],
                "jumlah_realisasi" => 0,
                "persen" => 0,
            ]
        ];

        $asnaf = $this->asnaf;

        $dataPerBantuan = [
            'produktif' => [
                "vol" => [0, 0],
                "jumlah_realisasi" => 0,
                "persen" => 0,
            ],
            'konsumtif' => [
                "vol" => [0, 0],
                "jumlah_realisasi" => 0,
                "persen" => 0,
            ]
        ];

        $asnafForChart = [
            "nama" => ['Fakir', 'Miskin', 'Amil', 'Muallaf', 'Riqob', 'Gharim', 'Fisabilillah', 'Ibnu Sabil'],
            "warna" => ['#FF5733', '#33FF57', '#5733FF', '#FF33A6', '#33C5FF', '#FFD933', '#33FFD9', '#B633FF'],
            "persen" => [0, 0, 0, 0, 0, 0, 0, 0]
        ];
        $programForChart = [
            "nama" => ["Produktif", "Konsumtif"],
            "warna" => ['#FF5733', '#33FF57'],
            "persen" => [0, 0]
        ];
        foreach ($dataPerProgram as $item) {
            $asnaf = str_replace(' ', '_', $asnaf);
            foreach ($asnaf as $index => $a) {
                $dataPerAsnaf['asnaf'][$index - 1]['target'] += $item->{'target_' . $a};
                $b = str_replace('_', ' ', $a);
                $dataPerAsnaf['asnaf'][$index - 1]['vol'][0] += $item->totalVol($b)[0];
                $dataPerAsnaf['asnaf'][$index - 1]['vol'][1] += $item->totalVol($b)[1];
                $dataPerAsnaf['asnaf'][$index - 1]['jumlah_realisasi'] += $item->totalRealisasi($b);
                $dataPerAsnaf['asnaf'][$index - 1]['persen'] += $item->persenRealisasi($b) / count($dataPerProgram);
                $asnafForChart['persen'][$index - 1] = $dataPerAsnaf['asnaf'][$index - 1]['persen'];
            }

            foreach ($item->detail as $detail) {
                if ($detail->jenis_bantuan == 'produktif') {
                    $dataPerBantuan['produktif']['vol'][0] += $detail->mustahiq->jenis == 'kelompok' ? 1 : 0;
                    $dataPerBantuan['produktif']['vol'][1] += $detail->mustahiq->jenis == 'perorangan' ? 1 : 0;
                    $dataPerBantuan['produktif']['jumlah_realisasi'] += $detail->jumlah;
                } else {
                    $dataPerBantuan['konsumtif']['vol'][0] += $detail->mustahiq->jenis == 'kelompok' ? 1 : 0;
                    $dataPerBantuan['konsumtif']['vol'][1] += $detail->mustahiq->jenis == 'perorangan' ? 1 : 0;
                    $dataPerBantuan['konsumtif']['jumlah_realisasi'] += $detail->jumlah;
                }
            }

            $dataPerAsnaf['jumlah']['target'] += $item->totalTarget();
            $dataPerAsnaf['jumlah']['vol'][0] += $item->totalVol()[0];
            $dataPerAsnaf['jumlah']['vol'][1] += $item->totalVol()[1];
            $dataPerAsnaf['jumlah']['jumlah_realisasi'] += $item->totalRealisasi();
            $dataPerAsnaf['jumlah']['persen'] += $item->persenRealisasi() / count($dataPerProgram);
        }

        $jumlahRealisasiBantuan = $dataPerBantuan['produktif']['jumlah_realisasi'] + $dataPerBantuan['konsumtif']['jumlah_realisasi'];
        $dataPerBantuan['produktif']['persen'] = number_format(($dataPerBantuan['produktif']['jumlah_realisasi'] / $jumlahRealisasiBantuan) * 100, 2);
        $programForChart['persen'][0] = $dataPerBantuan['produktif']['persen'];
        $programForChart['persen'][1] = $dataPerBantuan['konsumtif']['persen'];
        $dataPerBantuan['konsumtif']['persen'] = number_format(($dataPerBantuan['konsumtif']['jumlah_realisasi'] / $jumlahRealisasiBantuan) * 100, 2);

        $bulan = $this->bulanToString($request->bulan);
        $tahun = $request->tahun;

        return view('dashboard.pendistribusian.rekap', compact('dataPerProgram', 'bulan', 'tahun', 'dataPerAsnaf', 'asnaf', 'dataPerBantuan', 'asnafForChart', 'programForChart'));
    }
}
