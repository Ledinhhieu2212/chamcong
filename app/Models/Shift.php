<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;

    protected $table = 'shifts';

    protected $fillable = [
        'day_work_id',
        'type_shifts',
        'start_time',
        'end_time',
        'date_now',
    ];

    public function day_works()
    {
        return $this->belongsTo(Day_Works::class);
    }
}
