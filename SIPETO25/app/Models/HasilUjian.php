<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HasilUjian extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel (yaitu jamak)
    protected $table = 'hasil_ujian';

    // Primary key kustom (default-nya 'id')
    protected $primaryKey = 'id_hasil_ujian';

    // Jika primary key bukan increment integer
    public $incrementing = true;

    // Jika primary key bertipe string
    protected $keyType = 'int';

    // Field yang boleh diisi secara mass-assignment
    protected $fillable = [
        'id_mahasiswa',
        'rekap_hasil_ujian',
    ];
}
