<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timework extends Model
{
    use HasFactory;

    public function calendar()
    {
        return $this->belongsTo(User::class);
    }
}
