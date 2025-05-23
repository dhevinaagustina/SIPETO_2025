<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = true;

    protected $fillable = [
        'username', 'password', // pastikan ini ada di tabel
    ];

    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id_mahasiswa';
    }

    
}

