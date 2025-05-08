<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Login extends Authenticatable
{
    use Notifiable;

    protected $table = 'login';
    protected $primaryKey = 'id_login';
    public $timestamps = true;

    protected $fillable = [
        'username',
        'password',
        'tipe_user',
        'id_referensi',
    ];

    protected $hidden = [
        'password',
    ];

    // Laravel will use this for login auth
    public function getAuthIdentifierName()
    {
        return 'username';
    }

    public function getAuthPassword()
    {
        return $this->password;
    }
}
