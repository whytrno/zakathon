<?php


namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumpulanDetail extends BaseModel
{
    use HasFactory;

    public function pengumpulan()
    {
        return $this->belongsTo(Pengumpulan::class, 'pengumpulan_id');
    }

    public function rekening()
    {
        return $this->belongsTo(Rekening::class, 'rekening_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function muzakki()
    {
        return $this->belongsTo(Muzakki::class, 'muzakki_id');
    }
}
