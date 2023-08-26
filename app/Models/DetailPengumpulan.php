<?php


namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengumpulan extends Model
{
    protected $table = 'detail_pengumpulan';

    protected $fillable = [
        'pengumpulan_id',
        'muzakki_id',
        'rekening_id',
        'no_bukti',
        'jenis_dana',
        'dalam_neraca',
        'jumlah',
        'via',
        'status',
        'bukti_pembayaran',
    ];

    public function pengumpulan()
    {
        return $this->belongsTo(DataPengumpulan::class, 'pengumpulan_id');
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
        return $this->belongsTo(Muzakki::class, 'muzakki_id'); // Perbaikan disini

    }

}
