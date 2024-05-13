<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = 'calendars';
    protected $fillable = [
        'start_date',
        'end_date',
        'open_port',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,  'calendar_users')->withTimestamps();
    }

    public function calendar_users()
    {
        return $this->hasMany(calendar_users::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function timekeeps()
    {
        return $this->hasMany(timekeep::class);
    }
    public function detail_timekeeps()
    {
        return $this->hasMany(detail_timekeep::class);
    }
}
