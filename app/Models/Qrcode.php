<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SimpleSoftwareIO\QrCode\Facades\QrCode as FacadesQrCode;

class Qrcode extends Model
{
    use HasFactory, UUID;
    protected $table = "qrcodes";

    protected $fillable = [
        'name',
        'mode',
        'address',
        'qr_code',
    ];

    public function modeName($mode)
    {
        if ($mode == 1) {
            return 'Đăng nhập';
        }

        if ($mode == 2) {
            return 'Đăng nhập, chụp ảnh';
        }
    }
    public function users()
    {
        return $this->belongsToMany(User::class,  'qrcode_user')->withTimestamps();
    }

    public function CountUser()
    {
        return $this->users()->count();
    }

    public function ImageQrcode($query)
    {
        return FacadesQrCode::format('png')
            ->merge('img/t.jpg', 0.1, true)
            ->size(200)->errorCorrection('H')
            ->generate($query);
    }
}
