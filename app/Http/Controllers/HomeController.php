<?php

namespace App\Http\Controllers;

use App\Models\Donasi;
use App\Models\Muzakki;
use App\Models\Order;
use App\Models\Pengumpulan;
use App\Models\PengumpulanDetail;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public $jenis_dana;

    public function __construct()
    {
        $this->jenis_dana = ['zakat', 'infak/sedekah tidak terikat', 'infak/sedekah terikat', 'dskl', 'csr', 'zakat fitrah'];
    }

//    HOME PAGE
    public function homeIndex()
    {
        return view('index');
    }

    public function homeDonation()
    {
        $data = Donasi::where('status', 'disetujui')->get();

        return view('donasi', compact('data'));
    }

    public function homeDonationDetail($id)
    {
        $data = Donasi::findOrFail($id);

        return view('donasi-detail', compact('data'));
    }

    public function index()
    {
        $user = User::where('id', Auth::user()->id)->with('muzakki')->first();
        $jenis_dana = $this->jenis_dana;
        $rekening = Rekening::all();
        $snapToken = null;

        session('snap_token') ? $snapToken = session('snap_token') : $snapToken = null;

        return view('home.index', compact('rekening', 'user', 'jenis_dana', 'snapToken'));
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function history()
    {
        $data = PengumpulanDetail::where('muzakki_id', Auth::user()->muzakki->id)->with(['pengumpulan', 'rekening'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('home.history', compact('data'));
    }

    public function editProfile()
    {
        $data = User::where('id', Auth::user()->id)->with('muzakki')->first();

        return view('home.edit-profile', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $auth = Auth::user();
        $user = User::findOrFail($auth->id);

        $request->validate([
            'nama' => 'nullable|string|max:255',
            'email' => 'nullable|email|unique:users,email,' . $auth->id,
            'nik' => 'nullable|string|min:16|unique:users,nik,' . $auth->id,
            'jenis' => 'nullable|string',
            'alamat' => 'nullable|string',
            'jenis_kelamin' => 'nullable|in:laki laki,perempuan',
            'telepon' => 'nullable|string|min:10',
            'password' => 'nullable|string',
        ]);

        if ($request->password == '' | $request->password == null) {
            $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }

        $muzakki = Muzakki::where('user_id', $auth->id)->first();

        if (is_null($muzakki)) {
            Muzakki::create([
                'user_id' => $auth->id,
                'npwz' => rand(100000000000, 999999999999),
                'jenis' => $request->jenis,
            ]);
        } else {
            $muzakki->update([
                'jenis' => $request->jenis,
            ]);
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    public function bayarZakat(Request $request)
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
            'no_pengumpulan' => date('d') . '/' . date('m') . '/' . date('y') . '/' . rand(10000, 99999),
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

        return redirect()->route('home.index')->with('snap_token', $snapToken);
    }

    public function midtransCallback(Request $request)
    {

        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = PengumpulanDetail::where('no_pengumpulan', $request->order_id);
                $order->update(['status' => 'berhasil']);
            }
        }
    }
}
