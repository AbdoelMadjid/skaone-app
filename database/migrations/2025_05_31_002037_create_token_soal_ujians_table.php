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
        Schema::create('token_soal_ujians', function (Blueprint $table) {
            $table->id();
            $table->char('kode_ujian');
            $table->char('tanggal_ujian');
            $table->char('sesi_ujian');
            $table->char('matapelajaran');
            $table->char('kelas');
            $table->char('token_soal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_soal_ujians');
    }
};
