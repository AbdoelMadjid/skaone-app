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
        Schema::create('ujian_identitas', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_ajaran');
            $table->char('semester');
            $table->char('nama_ujian');
            $table->char('kode_ujian');
            $table->date('tgl_ujian_awal')->nullable();
            $table->date('tgl_ujian_akhir')->nullable();
            $table->date('titimangsa_ujian')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ujian_identitas');
    }
};
