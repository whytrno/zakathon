<?php
namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Rekening extends Model
{
    protected $table = 'rekening';

    protected $fillable = [
        'bank',
        'no_rek',
    ];

    public function detailPengumpulan()
    {
        return $this->hasMany(DetailPengumpulan::class, 'rekening_id');
    }
}
