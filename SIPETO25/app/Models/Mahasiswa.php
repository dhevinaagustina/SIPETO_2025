<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    use Notifiable;

    protected $table = 'mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    public $timestamps = true;

    protected $fillable = [
        'username', 'password',
    ];

    protected $hidden = ['password'];

    public static function getStatusCounts()
    {
        return [
            'total' => self::count(),
            'aktif' => self::where('status', 'aktif')->count(),
            'non_aktif' => self::where('status', 'non-aktif')->count()
        ];
    }
    
    public function getAuthIdentifierName()
    {
        return 'id_mahasiswa';
    }


    public function informasi()
    {
        return $this->belongsToMany(Informasi::class, 'informasi_mahasiswa', 'id_mahasiswa', 'id_informasi');


    }
    public function pendaftaranToeic()
    {
        return $this->hasOne(PendaftaranToeic::class, 'id_mahasiswa');
    }

    // Relasi ke surat pernyataan
    public function suratPernyataan()
    {
        return $this->hasMany(SuratPernyataan::class, 'id_mahasiswa');
    }
}


