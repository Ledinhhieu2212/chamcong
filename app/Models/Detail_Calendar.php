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
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }

    public function day_works()
    {
        return $this->hasMany(Day_Works::class);
    }
    
}
