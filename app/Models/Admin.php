<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'role',
        'username',
        'password',
        'email',
        'first_name',
        'last_name',
        'phone',
        'photo',
        'address',
        'city',
        'state',
        'country',
        'bio',
        'status',
        'ip',
        'last_login_ip',
        'date_added',
        'last_login',
        'updated_date',
    ];
}
