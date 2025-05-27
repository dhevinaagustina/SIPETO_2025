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
        'username', 'password',
    ];

    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id_mahasiswa';
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'mahasiswa_id', 'id_mahasiswa');
    }



    public function pendaftaranToeic()
    {
        return $this->hasOne(PendaftaranToeic::class, 'id_mahasiswa');
    }
}




