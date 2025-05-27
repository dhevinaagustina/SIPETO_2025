<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pendaftaran_toeic', function (Blueprint $table) {
            $table->dropColumn('id_jadwal');
        });
    }

    public function down(): void
    {
        Schema::table('pendaftaran_toeic', function (Blueprint $table) {
            $table->unsignedBigInteger('id_jadwal')->nullable(); // jika ingin restore
        });
    }
};
