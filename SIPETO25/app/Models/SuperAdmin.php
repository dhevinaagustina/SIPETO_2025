<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
{
    protected $table = 'super_admin';

    protected $fillable = [
        'username', 'nama', 'email', 'password',
    ];

    protected $hidden = ['password'];
}

