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

    // Lebih baik gunakan $casts untuk tanggal supaya Carbon otomatis
    protected $casts = [
        'tanggal_daftar' => 'datetime',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }

    // Accessor untuk path file, sudah bagus
    public function getScanKtpPathAttribute()
    {
        return 'foto/ktp/' . $this->scan_ktp;
    }

    public function getScanKtmPathAttribute()
    {
        return 'foto/ktm/' . $this->scan_ktm;
    }

    public function getPasFotoPathAttribute()
    {
        return 'foto/pasfoto/' . $this->pas_foto;
    }
}
