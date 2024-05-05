<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, UUID;
    protected $table = 'users';
    protected $guard = 'users';
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
        return $this->belongsToMany(Calendar::class, 'calendar_user')->withTimestamps();
    }

    public function isImageFile($filePath)
    {
        return is_file(public_path($filePath)) && getimagesize(public_path($filePath));
    }

    public function position()
    {
        return $this->belongsTo(Position::class);
    }


    public function timekeeps()
    {
        return $this->hasMany(Timekeep::class, 'user_id');
    }

    public function qrcodes()
    {
        return $this->belongsToMany(Qrcode::class, 'qrcode_user')->withTimestamps();
    }

    public function images()
    {
        return $this->belongsToMany(Calendar::class)->withPivot('image');
    }
}
