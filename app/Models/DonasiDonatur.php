<?php

namespace App\Models;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonasiDonatur extends BaseModel
{
    use HasFactory;

    public function donatur()
    {
        return $this->hasOne(Donatur::class, 'id', 'donatur_id');
    }
}
