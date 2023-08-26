<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPengumpulan extends Model
{
    protected $table = 'pengumpulan';
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $fillable = [
        'bulan',
        'tahun',
        'target_zakat',
        'target_infak',
        'target_csr',
        'target_dskl',
        'status',
    ];

    public function detailPengumpulan()
    {
        return $this->hasMany(DetailPengumpulan::class, 'pengumpulan_id');
    }

    public function getTotalRealisasi()
    {
        $realisasi_zakat = $this->detailPengumpulan->whereIn('jenis_dana', ['zakat', 'zakat fitrah'])->sum('jumlah');
        $realisasi_infak = $this->detailPengumpulan->whereIn('jenis_dana', ['infak/sedekah tidak terikat', 'infak/sedekah terikat'])->sum('jumlah');
        $realisasi_csr = $this->detailPengumpulan->where('jenis_dana', 'csr')->sum('jumlah');
        $realisasi_dskl = $this->detailPengumpulan->where('jenis_dana', 'dskl')->sum('jumlah');

        return $realisasi_zakat + $realisasi_infak + $realisasi_csr + $realisasi_dskl;
    }

    public function getPersentasePencapaian()
    {
        $totalTarget = $this->target_zakat + $this->target_infak + $this->target_csr + $this->target_dskl;
        $totalRealisasi = $this->getTotalRealisasi();

        if ($totalTarget != 0) {
            return number_format(($totalRealisasi / $totalTarget) * 100, 2) . '%';
        } else {
            return 'N/A';
        }
    }
}
