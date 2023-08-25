<?php

namespace App\Http\Controllers;

use App\Models\Mustahiq;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MustahiqController extends Controller
{
    public $banks, $asnafs, $pekerjaans;

    public function __construct()
    {
        $this->banks = ['BCA', 'BRI', 'Mandiri', 'BSI'];
        $this->asnafs = ['fakir', 'miskin', 'amil', 'mualaf', 'riqob', 'gharim', 'fisabilillah', 'ibnu sabil'];
        $this->pekerjaans = ['wirausaha', 'mahasiswa', 'karyawan', 'buruh'];
    }

    public function index()
    {
        $datas = Mustahiq::with('user')->get();

        return view('dashboard.mustahiq.index', compact('datas'));
    }

    public function create()
    {
        $banks = $this->banks;
        $asnafs = $this->asnafs;
        $pekerjaans = $this->pekerjaans;

        return view('dashboard.mustahiq.create', compact('banks', 'asnafs', 'pekerjaans'));
    }

    public function edit($id)
    {
        $banks = $this->banks;
        $asnafs = $this->asnafs;
        $pekerjaans = $this->pekerjaans;

        $data = Mustahiq::with('user')->findOrFail($id);

        return view('dashboard.mustahiq.edit', compact('data', 'banks', 'asnafs', 'pekerjaans'));
    }

    public function store(Request $request)
    {
        $request['role'] = 'mustahiq';

        $request->validate([
            'jenis' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'pemilik_rekening' => 'required|string',
            'bank' => 'required|string',
            'no_rek' => 'required|numeric',
            'asnaf' => 'required|string',
            'nik' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'jumlah_anggota' => 'nullable|numeric',
            'jenis_kelamin' => 'nullable|string',
            'telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
        ]);
        $request->merge([
            'nim' => rand(100000000000, 999999999999),
            'password' => bcrypt($request->nik),
        ]);

        try {
            $user = User::create($request->all());
            $user->mustahiq()->create($request->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }

        return redirect()->route('mustahiq.index')->with('success', 'Berhasil menambahkan data');
    }

    public function update(Request $request, $id)
    {
        $mustahiq = Mustahiq::findOrFail($id);

        $request->validate([
            'jenis' => 'required',
            'nama' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string',
            'tanggal_lahir' => 'nullable|date',
            'pemilik_rekening' => 'required|string',
            'bank' => 'required|string',
            'no_rek' => 'required|numeric',
            'asnaf' => 'required|string',
            'nik' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'jumlah_anggota' => 'nullable|numeric',
            'jenis_kelamin' => 'nullable|string',
            'telepon' => 'required|string|min:10',
            'alamat' => 'required|string',
        ]);

        try {
            $user = User::findOrFail($mustahiq->user_id);

            $user->mustahiq->update($request->all());

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }

        return redirect()->route('mustahiq.index')->with('success', 'Berhasil mengubah data');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);

        if ($data->mustahiq) {
            $data->mustahiq->delete();
        }

        $data->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}