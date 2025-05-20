<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $table = 'admin_upa';          // tabel sesuai DB
    protected $primaryKey = 'id_admin';      // primary key sesuai DB
    public $timestamps = true;

    protected $fillable = [
        'nama_admin', 'username', 'nip', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    // Auto-hash password saat set password
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
}
