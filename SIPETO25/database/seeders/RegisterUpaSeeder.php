<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class RegisterUpaSeeder extends Seeder
{
    public function run()
    {
        $adminConfig = config('admin.admin');

        DB::table('register_upa')->insert([
            'nama_admin' => $adminConfig['nama'],
            'username' => $adminConfig['username'],
            'password' => Hash::make($adminConfig['password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $this->command->info('Admin berhasil didaftarkan:');
        $this->command->info('Nama: ' . $adminConfig['nama']);
        $this->command->info('Username: ' . $adminConfig['username']);
    }
}