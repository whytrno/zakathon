<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendistribusian extends BaseModel
{
    use HasFactory;

    public function detail()
    {
        return $this->hasMany(PendistribusianDetail::class, 'pendistribusian_id');
    }

    public function totalTarget()
    {
        return $this->target_fakir + $this->target_miskin + $this->target_amil + $this->target_muallaf + $this->target_riqob + $this->target_gharim + $this->target_fisabilillah + $this->target_ibnu_sabil;
    }

    public function totalVol($asnaf = null)
    {
        $totalPerorangan = 0;
        $totalKelompok = 0;

        if (is_null($asnaf)) {
            $totalPerorangan = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->with('mustahiq')
                ->whereHas('mustahiq', function ($q) use ($asnaf) {
                    $q->where('jenis', 'perorangan');
                })
                ->count();

            $totalKelompok = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->with('mustahiq')
                ->whereHas('mustahiq', function ($q) use ($asnaf) {
                    $q->where('jenis', 'kelompok');
                })
                ->count();
        } else {
            $totalPerorangan = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->with('mustahiq')
                ->whereHas('mustahiq', function ($q) use ($asnaf) {
                    $q->where('asnaf', $asnaf);
                    $q->where('jenis', 'perorangan');
                })
                ->count();

            $totalKelompok = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->with('mustahiq')
                ->whereHas('mustahiq', function ($q) use ($asnaf) {
                    $q->where('asnaf', $asnaf);
                    $q->where('jenis', 'kelompok');
                })
                ->count();
        }

        return [
            $totalKelompok,
            $totalPerorangan
        ];
    }

    public function totalRealisasi($asnaf = null)
    {
        $total = 0;

        if (is_null($asnaf)) {
            $total = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->sum('jumlah');
        } else {
            $total = PendistribusianDetail::where('pendistribusian_id', $this->id)
                ->with('mustahiq')
                ->whereHas('mustahiq', function ($q) use ($asnaf) {
                    $q->where('asnaf', $asnaf);
                })
                ->sum('jumlah');
        }

        return $total;
    }

    public function persenRealisasi($asnaf = null)
    {
        $totalTarget = 0;
        $totalRealisasi = 0;

        if (is_null($asnaf)) {
            $totalTarget = $this->totalTarget();
            $totalRealisasi = $this->totalRealisasi($asnaf);
        } else {
            $asnaf = str_replace(' ', '_', $asnaf);
            $totalTarget = $this->where('id', $this->id)->pluck('target_' . $asnaf)->first();
            $totalRealisasi = $this->totalRealisasi($asnaf);
        }

        $persentase = ($totalRealisasi / $totalTarget) * 100;
        $persentase = number_format($persentase, 2);

        return $persentase;
    }
}
