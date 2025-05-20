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
        Schema::create('pengawas_ujians', function (Blueprint $table) {
            $table->id();
            $table->char('kode_ujian');
            $table->char('id_jadwal');
            $table->char('nomor_ruang');
            $table->char('kode_pengawas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawas_ujians');
    }
};
