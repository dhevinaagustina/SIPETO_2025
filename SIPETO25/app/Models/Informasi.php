<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin;

class Informasi extends Model
{
    use HasFactory;

    protected $table = 'informasi';

    protected $primaryKey = 'id';

    protected $fillable = [
        'judul',
        'isi',
        'lampiran',
        'ditujukan_ke',
        'id_admin',
    ];

    public function mahasiswa()
    {
        return $this->belongsToMany(Mahasiswa::class, 'informasi_mahasiswa', 'id_informasi', 'id_mahasiswa');
    }

    public function admin()
     {
    return $this->belongsTo(Admin::class, 'id_admin');
    }
}
