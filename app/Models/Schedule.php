<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';
    protected $fillable = [
        'calendar_user_id',
        'day',
        'shift_1',
        'shift_2',
        'shift_3',
    ];
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function timekeep()
    {
        return $this->hasOne(timekeep::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
