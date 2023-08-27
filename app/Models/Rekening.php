<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends BaseModel
{
    public function detailPengumpulan()
    {
        return $this->hasMany(PengumpulanDetail::class, 'rekening_id');
    }
}
