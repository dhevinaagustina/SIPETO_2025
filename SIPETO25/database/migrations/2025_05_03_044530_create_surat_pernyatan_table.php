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
        Schema::create('surat_pernyatan', function (Blueprint $table) {
            $table->id('id_surat_pernyataan'); // Primary key
            $table->string('nim');
            $table->string('alasan_pengajuan');
            $table->string('jurusan');
            $table->string('bukti_sertif_toeic')->nullable(); // Asumsikan bisa null jika belum upload
            $table->string('prodi');
            $table->date('tanggal_ujian');
            $table->string('kampus');
            $table->string('skor_toeic_terakhir');
            $table->string('nama_mahasiswa');
            $table->timestamps();

            // Foreign key constraint (opsional jika id_mahasiswa berasal dari tabel mahasiswa)
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa', 'id_mahasiswa')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_pernyatan');
    }
};
