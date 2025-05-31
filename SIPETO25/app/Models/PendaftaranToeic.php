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

   // Accessor untuk path file (digunakan untuk <img> atau link file)
    public function getScanKtpPathAttribute()
    {
        return $this->scan_ktp ? 'storage/' . $this->scan_ktp : null;
    }

    public function getScanKtmPathAttribute()
    {
        return $this->scan_ktm ? 'storage/' . $this->scan_ktm : null;
    }

    public function getPasFotoPathAttribute()
    {
        return $this->pas_foto ? 'storage/' . $this->pas_foto : null;
    }

}
