<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    use HasFactory;
    protected $table = "qrcodes";

    protected $fillable = [
        'name',
        'mode',
        'address_address',
        'address_latitude',
        'address_longitude',
    ];
    public function detail_qrcodes()
    {
        return $this->hasMany(Detail_QrCode::class);
    }
}
