<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory, UUID;
    protected $table = 'positions';


    protected $fillable = [
        'job',
        'price'
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function NamePosition($id)
    {
        return $this->where('id', $id)->value('job');
    }
}
