<?php

// app/Models/SuratPernyataan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPernyataan extends Model
{
    use HasFactory;

    protected $table = 'surat_pernyataan';

    protected $fillable = [
        'id_mahasiswa',
        'tanggal_pengajuan',
        'lampiran_1',
        'lampiran_2',
        'file_surat',
        'status',
        'status_validasi',
        'catatan_validasi',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}

