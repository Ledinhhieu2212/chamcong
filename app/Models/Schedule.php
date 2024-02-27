<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $table = 'schedules';

    // $table->unsignedBigInteger('detail_calendar_id');
    // $table->date('date');
    // $table->boolean('shift_1')->default(false);
    // $table->boolean('shift_2')->default(false);
    // $table->boolean('shift_3')->default(false);
    protected $fillable = [
        'date',
        'day',
        'detail_calendar_id',
        'shift_1',
        'shift_2',
        'shift_3',
    ];
    public function detail_calendar()
    {
        return $this->belongsTo(Detail_Calendar::class);
    }
}
