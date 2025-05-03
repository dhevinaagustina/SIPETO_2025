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
        Schema::create('hasil_ujian', function (Blueprint $table) {
            $table->id('id_hasil_ujian');  // Primary key with custom name
            $table->foreignId('id_mahasiswa')->constrained('mahasiswa', 'id_mahasiswa')->onDelete('cascade');
            $table->string('rekap_hasil_ujian');  // Column to store result summary or file path
            $table->timestamps();  // For created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_ujian');
    }
};
