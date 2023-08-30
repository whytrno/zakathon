<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donasi extends BaseModel
{
    use HasFactory;

    public function transaksi()
    {
        return $this->hasMany(DonasiDonatur::class, 'donasi_id', 'id');
    }

    public function terkumpul()
    {
        return $this->hasMany(DonasiDonatur::class, 'donasi_id', 'id')->sum('jumlah');
    }

    public function persen()
    {
        return number_format($this->terkumpul() / $this->target_donasi * 100, 2);
    }

    public function jumlahDonatur()
    {
        return $this->hasMany(DonasiDonatur::class, 'donasi_id', 'id')->count();
    }
}
