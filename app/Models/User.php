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
        'status',
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
        return $this->belongsToMany(Calendar::class, 'calendar_users')->withTimestamps();
    }

    public function calendar_users()
    {
        return $this->hasMany(Calendar_user::class);
    }

    public function isImageFile($filePath)
    {
        return is_file(public_path($filePath)) && getimagesize(public_path($filePath));
    }
    public function salaries()
    {
        return $this->hasMany(Salary::class );
    }
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    public function qrcodes()
    {
        return $this->belongsToMany(Qrcode::class, 'qrcode_user')->withTimestamps();
    }


    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function timekeeps()
    {
        return $this->hasMany(Timekeep::class);
    }
    public function detail_timekeeps()
    {
        return $this->hasMany(Detail_timekeep::class);
    }
}
