<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, UUID;

    protected $table = 'admins';
    protected $fillable = [
        'username', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
