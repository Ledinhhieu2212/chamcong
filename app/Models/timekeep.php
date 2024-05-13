<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timekeep extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_id',
        'user_id',
        'qrcode_id',
        'date',
        'time_in',
        'time_out',
    ];

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
    public function detail_timekeeps()
    {
        return $this->hasMany(detail_timekeep::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }
}
