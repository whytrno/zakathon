<?php

namespace App\Http\Controllers;

use App\Models\Muzakki;
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

    public function index()
    {
        $check = false;
        $user = User::where('id', Auth::user()->id)->with('muzakki')->first();
        $jenis_dana = $this->jenis_dana;
        $rekening = Rekening::all();

        return view('home.index', compact('rekening', 'check', 'user', 'jenis_dana'));
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function history()
    {
        $data = PengumpulanDetail::where('muzakki_id', Auth::user()->muzakki->id)->with(['pengumpulan', 'rekening'])->get();
        
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
            'rekening_id' => 'nullable|exists:rekenings,id',
            'jumlah' => 'required|numeric',
            'jenis_dana' => 'required',
            'bukti_pembayaran_file' => 'required',
        ]);

        $file = $request->file('bukti_pembayaran_file');
        $fileName = time() . '.' . $file->extension();
        $file->move(public_path('uploads/pengumpulan/bukti_pembayaran'), $fileName);

        $bulan = date('m');
        $tahun = date('Y');
        $pengumpulan = Pengumpulan::where('bulan', $bulan)->where('tahun', $tahun)->first();

        $request->merge([
            'pengumpulan_id' => $pengumpulan->id,
            'muzakki_id' => Auth::user()->muzakki->id,
            'via' => 'online',
            'dalam_neraca' => 1,
            'no_pengumpulan' => date('d') . '/' . date('m') . '/' . date('y') . '/' . rand(10000, 99999),
            'bukti_pembayaran' => $fileName,
        ]);

        PengumpulanDetail::create($request->all());

        return redirect()->route('home.history')->with('success', 'Berhasil mengubah data');
    }
}
