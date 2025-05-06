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
        Schema::create('mapel_transkrip', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_ajaran');
            $table->char('kode_kk');
            $table->char('no_urut_mapel');
            $table->char('kode_mapel');
            $table->char('no_urut_kode_mapel');
            $table->char('nama_mapel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapel_transkrip');
    }
};
