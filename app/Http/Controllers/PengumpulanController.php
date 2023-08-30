<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
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

        $this->jenis_dana_detail = [
            1 => 'zakat',
            2 => 'infak',
            3 => 'csr',
            4 => 'dskl',
        ];
    }

    public function index()
    {
        $datas = Pengumpulan::all();
        $bulan = $this->bulan;

        return view('dashboard.pengumpulan.index', compact('datas', 'bulan'));
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

    public function rekap(Request $request)
    {
        $request->validate([
            'bulan' => 'required|numeric',
            'tahun' => 'required|numeric|digits:4',
        ]);

        $bulan = $this->bulan[$request->bulan];
        $tahun = $request->tahun;

        $data = Pengumpulan::where('bulan', $request->bulan)
            ->where('tahun', $request->tahun)
            ->with(['detail.muzakki.user'])
            ->get();

        if (is_null($data)) {
            return redirect()->route('pendistribusian.index')->with('error', 'Data tidak ditemukan');
        }

        $dataPerAsnaf = [
            "asnaf" => [
                [
                    "name" => "zakat",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "infak",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "csr",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "dskl",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ]
            ],
            "jumlah" => [
                "target" => 0,
                "jumlah_realisasi" => 0,
                "persen" => 0,
            ]
        ];
        $dataPerJenisDana = [
            "jenis_dana" => [
                [
                    "name" => "zakat",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "infak/sedekah tidak terikat",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "infak/sedekah terikat",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "csr",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "dskl",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ],
                [
                    "name" => "zakat fitrah",
                    "target" => 0,
                    "jumlah_realisasi" => 0,
                    "persen" => 0,
                ]
            ],
            "jumlah" => [
                "target" => 0,
                "jumlah_realisasi" => 0,
                "persen" => 0,
            ]
        ];

        $jenis_dana_detail = $this->jenis_dana_detail;

        foreach ($data as $d) {
            foreach ($jenis_dana_detail as $index => $a) {
                $dataPerAsnaf['asnaf'][$index - 1]['target'] += $d->{'target_' . $a};
                $dataPerAsnaf['asnaf'][$index - 1]['jumlah_realisasi'] += $d->totalRealisasi($a);
                $dataPerAsnaf['asnaf'][$index - 1]['persen'] += $d->persenRealisasi($a);

                $dataPerJenisDana['jenis_dana'][$index - 1]['target'] += $d->{'target_' . $a};
            }

            $dataPerAsnaf['jumlah']['target'] += $d->totalTarget();
            $dataPerAsnaf['jumlah']['jumlah_realisasi'] += $d->totalRealisasi();
            $dataPerAsnaf['jumlah']['persen'] += $d->persenRealisasi() / count($data);
        }

        return view('dashboard.pengumpulan.rekap', compact('dataPerAsnaf', 'bulan', 'tahun', 'data', 'jenis_dana_detail', 'request'));
    }
}

