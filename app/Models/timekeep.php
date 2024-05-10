<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timekeep extends Model
{
    use HasFactory;
    protected $fillable = [
        'calendar_user_id',
        'schedule_id',
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

    public function calendar_user()
    {
        return $this->belongsTo(calendar_users::class);
    }
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
