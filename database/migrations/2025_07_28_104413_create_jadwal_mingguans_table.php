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
        Schema::create('jadwal_mingguans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rombel');
            $table->string('tahunajaran'); // contoh: 2024/2025
            $table->string('semester');    // Ganjil / Genap

            $table->string('id_personil');
            $table->string('mata_pelajaran');

            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat']);
            $table->json('jam_ke'); // [1,2,3] atau [4] dsb

            $table->time('waktu_mulai')->nullable();    // Opsional jika ingin display waktu
            $table->time('waktu_selesai')->nullable();

            $table->timestamps();

            $table->index(['kode_rombel', 'tahunajaran', 'semester', 'hari']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_mingguans');
    }
};
