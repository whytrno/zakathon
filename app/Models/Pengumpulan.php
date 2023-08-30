<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengumpulan extends BaseModel
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detail()
    {
        return $this->hasMany(PengumpulanDetail::class, 'pengumpulan_id')
            ->orderBy('created_at', 'desc');
    }

    public function totalTarget()
    {
        return $this->target_zakat + $this->target_infak + $this->target_csr + $this->target_dskl;
    }

    public function bulanToString($bulan)
    {
        $bulan_raw = [
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

        $bulan = (int)$bulan;
        $bulan = $bulan_raw[$bulan];
        return $bulan;
    }

    public function totalRealisasi($jenis_dana = null)
    {
        $total = 0;

        if (is_null($jenis_dana)) {
            $total = PengumpulanDetail::where('pengumpulan_id', $this->id)
                ->where('status', 'berhasil')
                ->sum('jumlah');
        } else {
            if ($jenis_dana == 'zakat' || $jenis_dana == 'zakat_fitrah') {
                $total = PengumpulanDetail::where('pengumpulan_id', $this->id)
                    ->where('jenis_dana', 'zakat')
                    ->where('status', 'berhasil')
                    ->orWhere('jenis_dana', 'zakat fitrah')
                    ->sum('jumlah');
            } else if ($jenis_dana == 'infak/sedekah tidak terikat' || $jenis_dana == 'infak/sedekah terikat') {
                $total = PengumpulanDetail::where('pengumpulan_id', $this->id)
                    ->where('jenis_dana', 'infak/sedekah tidak terikat')
                    ->where('status', 'berhasil')
                    ->orWhere('jenis_dana', 'infak/sedekah terikat')
                    ->sum('jumlah');
            } else {
                $total = PengumpulanDetail::where('pengumpulan_id', $this->id)
                    ->where('jenis_dana', $jenis_dana)
                    ->where('status', 'berhasil')
                    ->sum('jumlah');
            }
        }

        return $total;
    }


    public function persenRealisasi($jenis_dana = null)
    {
        $totalTarget = 0;
        $totalRealisasi = 0;

        if (is_null($jenis_dana)) {
            $totalTarget = $this->totalTarget();
            $totalRealisasi = $this->totalRealisasi($jenis_dana);
        } else {
            $totalRealisasi = $this->totalRealisasi($jenis_dana);

            $totalTarget = $this->where('id', $this->id)->pluck('target_' . $jenis_dana)->first();
        }

        $persentase = ($totalRealisasi / $totalTarget) * 100;

        return $persentase;
    }
}
