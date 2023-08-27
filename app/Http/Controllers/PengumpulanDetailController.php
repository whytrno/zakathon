<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use App\Models\Pengumpulan;
use App\Models\PengumpulanDetail;
use App\Models\Rekening;
use Illuminate\Http\Request;

class PengumpulanDetailController extends Controller
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

    public function bulanToString($bulan)
    {
        $bulan = (int)$bulan;
        $bulan = $this->bulan[$bulan];
        return $bulan;
    }

    public function index($id)
    {
        $data = Pengumpulan::where('id', $id)->with(['detail'])->first();
        $data->bulan = $this->bulanToString($data->bulan);
        $jenis_dana_detail = $this->jenis_dana_detail;

        return view('dashboard.pengumpulan.detail.index', compact('data', 'jenis_dana_detail', 'id'));
    }

    public function create($id)
    {
        $data = Pengumpulan::findOrFail($id);
        $jenis_dana = $this->jenis_dana;
        $rekening = Rekening::all();

        $data->bulan = $this->bulanToString($data->bulan);

        return view('dashboard.pengumpulan.detail.create', compact('data', 'id', 'jenis_dana', 'rekening'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'muzakki_id' => 'required|exists:muzakkis,id',
            'rekening_id' => 'nullable|exists:rekenings,id',
            'dalam_neraca' => 'required',
            'jumlah' => 'required|numeric',
            'via' => 'required',
            'jenis_dana' => 'required',
            'bukti_pembayaran_file' => 'required',
        ]);

        $file = $request->file('bukti_pembayaran_file');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('uploads/pengumpulan/bukti_pembayaran'), $fileName);

        $request->merge([
            'pengumpulan_id' => $id,
            'no_pengumpulan' => date('d') . '/' . date('m') . '/' . date('y') . '/' . rand(10000, 99999),
            'bukti_pembayaran' => $fileName,
        ]);

        PengumpulanDetail::create($request->all());

        return redirect()->route('pengumpulan.detail.index', $id)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id, $detail_id)
    {
        $jenis_dana = $this->jenis_dana;
        $data = PengumpulanDetail::where('id', $detail_id)->with(['pengumpulan', 'muzakki.user', 'rekening'])->first();
        $rekening = Rekening::all();

        $data->pengumpulan->bulan = $this->bulanToString($data->pengumpulan->bulan);

        return view('dashboard.pengumpulan.detail.edit', compact('data', 'id', 'detail_id', 'jenis_dana', 'rekening'));
    }

    public function update(Request $request, $id, $detail_id)
    {
        $request->validate([
            'rekening_id' => 'required|exists:rekenings,id',
            'dalam_neraca' => 'required',
            'jumlah' => 'required|numeric',
            'via' => 'required',
            'jenis_dana' => 'required',
        ]);

        $data = PengumpulanDetail::findOrFail($detail_id);

        if ($request->hasFile('bukti_pembayaran_file')) {
            $file_path = public_path('uploads/pengumpulan/bukti_pembayaran/' . $data->bukti_pembayaran);

            if (!is_null($data->bukti_pembayaran) && file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('bukti_pembayaran_file');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/pengumpulan/bukti_pembayaran/'), $fileName);

            $request->merge([
                'bukti_pembayaran' => $fileName,
            ]);
        }

        $data->update($request->all());

        return redirect()->route('pengumpulan.detail.index', $id)->with('success', 'Data berhasil diubah');
    }

    public function destroy($id, $detail_id)
    {
        $data = PengumpulanDetail::findOrFail($detail_id);

        $file_path = public_path('uploads//bukti_pembayaran/' . $data->bukti_pembayaran);
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $data->delete();

        return redirect()->route('pengumpulan.detail.index', $id)->with('success', 'Data berhasil dihapus');
    }

    public function numberToTerbilang($nominal)
    {
        $get_data = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
        if ($nominal < 12)
            return " " . $get_data[$nominal];
        elseif ($nominal < 20)
            return $this->numberToTerbilang($nominal - 10) . "belas";
        elseif ($nominal < 100)
            return $this->numberToTerbilang($nominal / 10) . " puluh" . $this->numberToTerbilang($nominal % 10);
        elseif ($nominal < 200)
            return " seratus" . $this->numberToTerbilang($nominal - 100);
        elseif ($nominal < 1000)
            return $this->numberToTerbilang($nominal / 100) . " ratus" . $this->numberToTerbilang($nominal % 100);
        elseif ($nominal < 2000)
            return " seribu" . $this->numberToTerbilang($nominal - 1000);
        elseif ($nominal < 1000000)
            return $this->numberToTerbilang($nominal / 1000) . " ribu" . $this->numberToTerbilang($nominal % 1000);
        elseif ($nominal < 1000000000)
            return $this->numberToTerbilang($nominal / 1000000) . " juta" . $this->numberToTerbilang($nominal % 1000000);
    }

    public function print($id, $detail_id)
    {
        $data = PendistribusianDetail::where('id', $detail_id)->with(['pendistribusian', 'mustahiq.user'])->first();
        $data['terbilang'] = $this->numberToTerbilang($data->jumlah);

        return view('dashboard.pendistribusian.detail.print', compact('data'));
    }
}
