<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KampusSeeder extends Seeder
{
    public function run()
    {
        $kampusList = [
            'Politeknik Negeri Malang Kampus Utama',
            'Politeknik Negeri Malang PSDKU Lumajang',
            'Politeknik Negeri Malang PSDKU Kediri',
            'Politeknik Negeri Malang PSDKU Pamekasan',
            'Lainnya'
        ];

        foreach ($kampusList as $nama) {
            DB::table('kampus')->insert(['nama' => $nama]);
        }
    }
}
