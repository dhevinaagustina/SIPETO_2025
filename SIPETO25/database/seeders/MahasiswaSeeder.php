<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        $mahasiswa = [
            [
                'nama_mahasiswa' => 'syifa Revalina',
                'username' => 'syifa123',
                'email' => 'ssy@example.com',
                'nim' => '2341760041',
                'password' => '',
                'jurusan' => 'Teknik Informatika',
                'prodi' => 'D4 Sistem Informasi Bisnis',
                'kampus' => 'Politeknik Negeri Malang',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        DB::table('mahasiswa')->insert($mahasiswa);
    }
}
