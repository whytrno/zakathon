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
}
