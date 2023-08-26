<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPengumpulan;
use App\Models\DetailPengumpulan;
use App\Models\Muzakki;


class PengumpulanController extends Controller
{
    public function index()
    {
        $datas = DataPengumpulan::all();
        return view('dashboard.pengumpulan.index', compact('datas'));
    }


    public function detail($id)
    {
        $datas = DataPengumpulan::where('id', $id)
            ->with('detailPengumpulan')->first();

        $dataByRole = [
            'perorangan' => [],
            'lembaga upz' => [],
            'lembaga non upz' => [],
        ];

        $muzakkis = Muzakki::all();
        foreach ($muzakkis as $muzakki) {
            $role = $muzakki->jenis;
            $user_id = $muzakki->user_id;
            $dataByRole[$role][$user_id] = $muzakki->user_id;
        }

//        dd($dataByRole);


        return view('dashboard.pengumpulan.detail', compact('datas', 'dataByRole'));

    }


}

