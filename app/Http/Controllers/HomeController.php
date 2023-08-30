<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseTrait;
use App\Models\Donasi;
use App\Models\DonasiDonatur;
use App\Models\Donatur;
use App\Models\Muzakki;
use App\Models\Order;
use App\Models\Pengumpulan;
use App\Models\PengumpulanDetail;
use App\Models\PermohonanBantuan;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    use ResponseTrait;

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
        $data = Donasi::with(['transaksi.donatur'])->findOrFail($id);
        $snapToken = null;

        session('snap_token') ? $snapToken = session('snap_token') : $snapToken = null;

        return view('donasi-detail', compact('data', 'id', 'snapToken'));
    }

    public function donasiSekarang(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
        ]);

        $request->merge([
            'donasi_id' => $id,
            'no_donasi' => date('d') . date('m') . date('y') . rand(10000, 99999),
        ]);

        $donatur = Donatur::where('telepon', $request->telepon)
            ->orWhere('email', $request->email)
            ->first();

        if ($donatur) {
            $request->merge([
                'donatur_id' => $donatur->id,
            ]);
            $insertedData = DonasiDonatur::create($request->all());
        } else if ($request->telepon != null && $request->email != null) {
            $request->merge([
                'donatur_id' => Donatur::create($request->all())->id,
            ]);
            $insertedData = DonasiDonatur::create($request->all());
        } else {
            $insertedData = DonasiDonatur::create($request->all());
        }

        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $insertedData->no_donasi,
                'gross_amount' => $insertedData->jumlah,
            ),
            'customer_details' => array(
                'name' => 'Hamba Allah',
            ),
            'test_type_tt' => 'donasi',
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return redirect()->route('home-page.donasi.detail', $id)->with('snap_token', $snapToken);
    }

    public function pengajuanBantuan()
    {
        $inputFile = [
            [
                "name" => "surat_permohonan_bantuan",
                "judul" => "Surat Permohonan Bantuan",
                "keterangan" => "Surat permohonan diketahui Rt/Lurah/Kades"
            ],
            [
                "name" => "surat_permohonan_bantuan_modal",
                "judul" => "Surat Permohonan Bantuan Modal",
                "keterangan" => "Surat Permohonan Bantuan Modal Usaha Produktif yang berisi:
                    Rincian biaya modal
                    Asumsi/perkiraan keuntungan"
            ],
            [
                "name" => "surat_keterangan_rt_lurah_kades",
                "judul" => "Surat Keterangan Ketua RT/Lurah/Kades",
            ],
            [
                "name" => "proposal_pembangunan_masjid",
                "judul" => "Proposal Permohonan Bantuan Pembangunan/Rehab Mesjid/Langgar/Tempat Pendidikan Al Qur’an (TPA)",
                "keterangan" => "Proposal Permohonan Bantuan Pembangunan/Rehab Mesjid/Langgar/Tempat Pendidikan Al Qur’an (TPA)
                    Yang dilengkapi: Surat Permohonan yang diketahui oleh Lurah/Kepala Desa/Camat setempat
                    Rencana Anggaran Biaya (RAB)
                    Susunan Panitia Pelaksana Pembangunan/Rehab"
            ],
            [
                "name" => "foto_objek_masjid",
                "judul" => "Foto obyek mesjid/langgar/TPA yang akan dibangun/rehab",
                "keterangan" => "Disatukan menjadi file PDF"
            ],
            [
                "name" => "surat_permohonan_bantuan_pembangunan_rehab_rumah_layak_huni",
                "judul" => "Surat Permohonan Bantuan Pembangunan/rehab rumah layak huni",
                "keterangan" => "Surat Permohonan Bantuan Pembangunan/rehab rumah layak huni, yang berisi :
                    Rincian Anggaran Biaya
                    Rencana Ukuran Bangunan
                    Foto obyek rumah/bagian rumah yang akan direhab/diperbaiki"
            ],
            [
                "name" => "surat_keterangan_lahan_lokasi_tanah_milik_sendiri",
                "judul" => "Surat Keterangan Lahan/Lokasi/Tanah milik sendiri"
            ],
            [
                "name" => "surat_keterangan_lahan_lokasi_tanah_tidak_dalam_sengketa",
                "judul" => "Surat Keterangan Lahan/Lokasi/Tanah tidak bermasalah/tidak dalam sengketa"
            ],
            [
                "name" => "struktur_panitia_pembangunan",
                "judul" => "Struktur Panitia Pembangunan (kalau ada)"
            ],
            [
                "name" => "surat_permohonan_beasiswa",
                "judul" => "Surat Permohonan Beasiswa (menyertakan tanda tangan orang tua/wali)"
            ],
            [
                "name" => "surat_permohonan_bantuan_biaya_berobat",
                "judul" => "Surat Permohonan bantuan biaya berobat"
            ],
            [
                "name" => "surat_keterangan_sakit_rujukan",
                "judul" => "Surat Keterangan Sakit/Rujukan"
            ],
            [
                "name" => "slip_pembayaran_rumah_sakit",
                "judul" => "Slip pembayaran rumah sakit"
            ],
            [
                "name" => "keterangan_aktif_kuliah",
                "judul" => "Surat Keterangan masih aktif kuliah minimal semester IV"
            ],
            [
                "name" => "lembar_hasil_studi_terakhir",
                "judul" => "Lembar Hasil Studi (LHS) terakhir"
            ],
            [
                "name" => "bukti_pembayaran_spp_terakhir",
                "judul" => "Bukti pembayaran SPP terakhir"
            ],
            [
                "name" => "pas_foto",
                "judul" => "Foto berwarna 3 x 4 cm"
            ],
            [
                "name" => "ktp",
                "judul" => "Scan Kartu Tanda Penduduk"
            ],
            [
                "name" => "ktp_sekertasi_pelaksana",
                "judul" => "Scan Kartu Tanda Penduduk Sekertaris Pelaksana"
            ],
            [
                "name" => "ktp_mahasiswa",
                "judul" => "Scan Kartu Tanda Penduduk Mahasiswa"
            ],
            [
                "name" => "kk",
                "judul" => "Scan Kartu Keluarga"
            ],
            [
                "name" => "sktm",
                "judul" => "Surat Keterangan Tidak Mampu dari RT/Lurah/Kades"
            ],
        ];

        return view('pengajuan-bantuan', compact('inputFile'))->with('success', 'Berhasil mengajukan bantuan');
    }

    public function pengajuanBantuanStore(Request $request)
    {
        $request->validate([
            "jenis_bantuan" => "required",
            "nama_pemohon" => "required",
        ]);

        $arrayFiles = [];

        foreach ($request->file() as $key => $value) {
            $file = $request->file($key);
            $fileName = time() . rand(1000000, 9999999) . '.' . $file->extension();
            $file->move(public_path('uploads/pengajuan-bantuan'), $fileName);

            $arrayFiles[$key] = $fileName;
        }

        $request->merge([
            "file" => json_encode($arrayFiles),
            'no_permohonan' => date('d') . date('m') . date('y') . rand(10000, 99999),
        ]);

        PermohonanBantuan::create($request->all());

        return redirect()->back()->with('success', 'Berhasil mengajukan bantuan');
    }

// END

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

        return redirect()->route('home.index')->with('snap_token', $snapToken);
    }

    public function midtransCallback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = PengumpulanDetail::where('no_pengumpulan', $request->order_id);
                $order->update([
                    'status' => 'berhasil',
                ]);
            }
        }
    }

    public function midtransCallbackWebview($snapToken)
    {
        if (is_null($snapToken)) {
            return $this->failedResponse('Snap token tidak ditemukan');
        }
        return view('home.midtrans-callback-webview', compact('snapToken'));
    }
}
