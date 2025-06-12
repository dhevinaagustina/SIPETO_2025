<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Dosen extends Authenticatable
{
    protected $table = 'dosen'; // Pastikan nama tabelmu sesuai, ubah ke 'dosen' jika perlu

    protected $primaryKey = 'id_dosen';

    public $timestamps = true; // Karena ada created_at dan updated_at

    protected $fillable = [
        'nama_dosen',
        'nip',
        'email',
        'username',
        'password',
        'photo_path',
    ];

    protected $hidden = [
        'password',
    ];

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'id_dosen');
    }

}
