<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class timekeep extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date', 'time_in', 'time_out', 'status', 'late_status', 'early_status', 'absent_status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
