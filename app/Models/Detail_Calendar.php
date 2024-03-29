<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_Calendar extends Model
{
    use HasFactory;
    protected $table = 'detail_calendars';

    protected $fillable = [
        'user_id',
        'calendar_id',
        'is_registered'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function scheludes()
    {
        return $this->hasMany(Schedule::class);
    }

}
