<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendistribusianDetail extends BaseModel
{
    use HasFactory;

    public function pendistribusian()
    {
        return $this->belongsTo(Pendistribusian::class, 'pendistribusian_id');
    }

    public function mustahiq()
    {
        return $this->belongsTo(Mustahiq::class, 'mustahiq_id');
    }
}