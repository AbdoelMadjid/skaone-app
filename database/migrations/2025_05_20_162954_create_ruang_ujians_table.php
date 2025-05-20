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
        Schema::create('ruang_ujians', function (Blueprint $table) {
            $table->id();
            $table->char('kode_ujian');
            $table->char('nomor_ruang');
            $table->char('kelas_kiri');
            $table->char('kelas_kanan');
            $table->char('kode_kelas_kiri');
            $table->char('kode_kelas_kanan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang_ujians');
    }
};
