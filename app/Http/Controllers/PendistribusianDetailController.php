<?php

namespace App\Http\Controllers;

use App\Models\Pendistribusian;
use App\Models\PendistribusianDetail;
use Illuminate\Http\Request;

class PendistribusianDetailController extends Controller
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
        $bulan = (int) $bulan;
        $bulan = $this->bulan[$bulan];
        return $bulan;
    }

    public function index($id)
    {
        $data = Pendistribusian::where('id', $id)->with(['detail'])->first();
        $data->bulan = $this->bulanToString($data->bulan);
        $asnaf = $this->asnaf;

        return view('dashboard.pendistribusian.detail.index', compact('data', 'asnaf', 'id'));
    }

    public function create($id)
    {
        $data = Pendistribusian::findOrFail($id);

        return view('dashboard.pendistribusian.detail.create', compact('data', 'id'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'mustahiq_id' => 'required|exists:mustahiqs,id',
            'jenis_bantuan' => 'required',
            'jumlah' => 'required|numeric',
            'via' => 'required',
            'bukti_pembayaran_file' => 'required',
        ]);

        $file = $request->file('bukti_pembayaran_file');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('uploads/bukti_pembayaran'), $fileName);

        $request->merge([
            'pendistribusian_id' => $id,
            'no_pendistribusian' => rand(1000000000, 9999999999),
            'bukti_pembayaran' => $fileName,
        ]);

        PendistribusianDetail::create($request->all());

        return redirect()->route('pendistribusian.detail.index', $id)->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id, $detail_id)
    {
        $data = PendistribusianDetail::where('id', $detail_id)->with(['pendistribusian', 'mustahiq.user'])->first();

        return view('dashboard.pendistribusian.detail.edit', compact('data', 'id', 'detail_id'));
    }

    public function update(Request $request, $id, $detail_id)
    {
        $request->validate([
            'jenis_bantuan' => 'required',
            'jumlah' => 'required|numeric',
            'via' => 'required',
        ]);

        $data = PendistribusianDetail::findOrFail($detail_id);

        if ($request->hasFile('bukti_pembayaran_file')) {
            $file_path = public_path('uploads/bukti_pembayaran/' . $data->bukti_pembayaran);
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            $file = $request->file('bukti_pembayaran_file');
            $fileName = time() . '.' . $file->extension();
            $file->move(public_path('uploads/bukti_pembayaran'), $fileName);

            $request->merge([
                'bukti_pembayaran' => $fileName,
            ]);
        }

        $data->update($request->all());

        return redirect()->route('pendistribusian.detail.index', $id)->with('success', 'Data berhasil diubah');
    }

    public function destroy($id, $detail_id)
    {
        $data = PendistribusianDetail::findOrFail($detail_id);

        $file_path = public_path('uploads/bukti_pembayaran/' . $data->bukti_pembayaran);
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $data->delete();

        return redirect()->route('pendistribusian.detail.index', $id)->with('success', 'Data berhasil dihapus');
    }
}