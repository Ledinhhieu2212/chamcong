<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calendar_users extends Model
{
    use HasFactory;

    protected $table = 'calendar_users';
    protected $fillable = [
        "user_id", "calendar_id"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'calendar_user_id');
    }

    public function timekeeps()
    {
        return $this->hasMany(timekeep::class, 'calendar_user_id');
    }
}
