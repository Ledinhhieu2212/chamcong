<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_timekeep extends Model
{
    use HasFactory;
    protected $fillable = [
        'timekeep_id',
        'calendar_id',
        'user_id',
        'day',
        'month',
        'year',
        'shift',
        'status'
    ];

    public function timekeep()
    {
        return $this->belongsTo(timekeep::class);
    }
    public function calendar()
    {
        return $this->belongsTo(Calendar::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function NameStatus()
    {
        if ($this->status == 1) {
            echo `<span class="btn btn-success"><i class="fa-solid fa-check"></i></span>`;
        } else if ($this->status == 2) {
            echo '<span class="btn btn-warning"><i class="fa-solid fa-exclamation"></i></span>';
        } else if ($this->status == 3) {
            echo '<span class="btn btn-purple"><i class="fa-solid fa-circle-exclamation"></i> </span>';
        } else if ($this->status == 4) {
            echo `<span class="btn btn-secondary"> </span>`;
        } else if ($this->status == 5) {
            echo '<span class="btn btn-primary"><i class="fa-solid fa-check-double"></i> </span>';
        } else if ($this->status == 6) {
            echo '<span class="btn btn-danger"><i class="fa-solid fa-circle-xmark"></i> </span>';
        }
    }
}
