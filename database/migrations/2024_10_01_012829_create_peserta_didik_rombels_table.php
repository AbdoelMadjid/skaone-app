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
        Schema::create('peserta_didik_rombels', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_ajaran');
            $table->char('kode_kk');
            $table->char('rombel_tingkat');
            $table->char('rombel_kode');
            $table->char('rombel_nama');
            $table->char('nis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didik_rombels');
    }
};
