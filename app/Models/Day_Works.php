<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day_Works extends Model
{
    use HasFactory;
    protected $table = 'day_works';

    protected $fillable = [
        'detail_calendar_id',
        'date_day',
    ];

    public function detail_calendar()
    {
        return $this->belongsTo(Detail_Calendar::class);
    }

    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }
}
