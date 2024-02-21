<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_QrCode extends Model
{
    use HasFactory;
    protected $table = "detail_qrcodes";
    protected $fillable = [
        'user_id',
        'qrcode_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }
}
