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
        'file_surat',
        'status',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'id_mahasiswa');
    }
}

