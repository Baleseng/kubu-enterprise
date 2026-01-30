<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'status',
        'urlfolder',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
