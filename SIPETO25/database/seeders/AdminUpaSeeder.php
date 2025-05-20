<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUpaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('admin_upa')->truncate();

        DB::table('admin_upa')->insert([
            'id_admin'   => 1,
            'nama_admin' => 'Budi Santoso',
            'username'   => 'Budi Santoso', // digunakan untuk login
            'nip'        => '198012122005011001',
            'email'      => 'budi@example.com',
            'password'   => Hash::make('admin123'), // hash password asli
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
