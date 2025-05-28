<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    protected $table = 'informasi'; // Tetap gunakan tabel 'informasi'

    protected $fillable = [
        'judul', 'isi', 'tipe_lampiran', 'lampiran', 'ditujukan_ke', 'id_admin'
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'informasi_mahasiswa', 'id_informasi', 'id_mahasiswa');
    }
}
