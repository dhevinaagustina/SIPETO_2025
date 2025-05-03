<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pendaftaran_toeic', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jadwal')->constrained('jadwal', 'id_jadwal')->onDelete('cascade');
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa', 'id_mahasiswa')->onDelete('cascade');
            $table->string('kampus');
            $table->string('nama_mahasiswa');
            $table->string('nim');
            $table->string('nik');
            $table->string('prodi');
            $table->string('jurusan');
            $table->string('no_wa');
            $table->string('scan_ktm');
            $table->string('scan_ktp');
            $table->string('pas_foto');
            $table->string('alamat_asal');
            $table->string('alamat_sekarang');
            $table->date('tanggal_daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_toeic');
    }
};
