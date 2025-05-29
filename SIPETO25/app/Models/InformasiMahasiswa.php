<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class InformasiMahasiswa extends Pivot
{
    protected $table = 'informasi_mahasiswa';

    protected $fillable = [
        'id_informasi',
        'id_mahasiswa',
    ];
}
