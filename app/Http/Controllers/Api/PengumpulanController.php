<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\Pengumpulan;
use App\Models\PengumpulanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumpulanController extends Controller
{
    use ResponseTrait;

    public function index()
    {
        $data = Pengumpulan::with('detail')->get();

        return $this->successResponse($data, 'Berhasil mendapatkan data pengumpulan');
    }

    public function bayar(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'jenis_dana' => 'required',
        ]);

        $bulan = date('m');
        $tahun = date('Y');
        $pengumpulan = Pengumpulan::where('bulan', $bulan)->where('tahun', $tahun)->first();

        $request->merge([
            'pengumpulan_id' => $pengumpulan->id,
            'muzakki_id' => Auth::user()->muzakki->id,
            'via' => 'online',
            'dalam_neraca' => 1,
            'no_pengumpulan' => date('d') . date('m') . date('y') . rand(10000, 99999),
        ]);

        $insertedData = PengumpulanDetail::create($request->all());

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $insertedData->no_pengumpulan,
                'gross_amount' => $insertedData->jumlah,
            ),
            'customer_details' => array(
                'name' => auth()->user()->nama,
                'phone' => auth()->user()->telepon,
                'address' => auth()->user()->alamat,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $authString = base64_encode(config('midtrans.server_key') . ':');

        return $this->successResponse([
            'snap_token' => $snapToken,
            'order_id' => $insertedData->no_pengumpulan,
            'gross_amount' => $insertedData->jumlah,
            'auth_string' => $authString,
        ], 'Berhasil mendapatkan snap token');
    }
}
