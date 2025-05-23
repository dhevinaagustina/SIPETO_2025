<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftaranToeic extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran_toeic';

    protected $fillable = [
        'id_mahasiswa',
         'tipe_ujian',
        'nik',
        'no_wa',
        'scan_ktm',
        'scan_ktp',
        'pas_foto',
        'alamat_asal',
        'alamat_sekarang',
        'tanggal_daftar',
    ];

    protected $dates = ['tanggal_daftar'];
}

