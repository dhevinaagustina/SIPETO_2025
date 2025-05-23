<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $primaryKey = 'id_mahasiswa';

    protected $fillable = [
        'nama_mahasiswa',
        'username',
        'email',
        'nim',
        'password',
        'jurusan',
        'prodi',
        'kampus',
        'status_ujian',
    ];
    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id_mahasiswa';
    }
}
