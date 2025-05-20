<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginSeeder extends Seeder
{
    public function run()
    {
        DB::table('login')->truncate();

        // Seeder untuk admin
        $admins = DB::table('admin_upa')->get();
        foreach ($admins as $admin) {
        DB::table('login')->insert([
                'username'     => $admin->nama_admin, // pakai nama sebagai username
                'password'     => Hash::make('admin123'),
                'tipe_user'    => 'admin',
                'id_referensi' => $admin->id_admin,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

}
        // Seeder untuk mahasiswa
        $mahasiswa = DB::table('mahasiswa')->get();
        foreach ($mahasiswa as $mhs) {
            DB::table('login')->insert([
                'username' => $mhs->nim,
                'password' => Hash::make('mahasiswa123'),
                'tipe_user' => 'mahasiswa',
                'id_referensi' => $mhs->nim,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
