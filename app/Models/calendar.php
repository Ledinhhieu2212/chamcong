<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    use HasFactory, UUID;
    protected $table = 'calendars';


    protected $fillable = [
        'start_date',
        'end_date',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class,  'calendar_user')->withTimestamps();
    }
}
