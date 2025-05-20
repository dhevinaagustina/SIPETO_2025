<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // sesuaikan dengan nama tabel aslinya
    protected $primaryKey = 'nim';
    public $timestamps = false;

    protected $fillable = [
        'nim', 'nama', 'jurusan', 'prodi'
    ];
}
