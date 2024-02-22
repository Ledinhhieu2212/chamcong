<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory;
    protected $table = 'calendars';


    protected $fillable = [
        'date_now',
        'start_date',
        'end_date',
        'is_calendar_enabled',
    ];
    public function detail_calendars()
    {
        return $this->hasMany(Detail_Calendar::class);
    }
}
