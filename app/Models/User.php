<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'phone',
        'cccd',
        'address',
        'sex',
        'password',
        'birthday',
        'image',
        'position_id',
        'qrcode_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function calendars()
    {
        return $this->hasMany(calendar::class);
    }

    public function qrcode()
    {
        return $this->belongsTo(Qrcode::class);
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }
}
