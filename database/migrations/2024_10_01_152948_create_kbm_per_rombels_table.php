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
        Schema::create('kbm_per_rombels', function (Blueprint $table) {
            $table->id();
            $table->char('kode_mapel_rombel');
            $table->char('tahunajaran');
            $table->char('kode_kk');
            $table->char('tingkat');
            $table->char('ganjilgenap');
            $table->char('semester');
            $table->char('kode_rombel');
            $table->char('rombel');
            $table->string('kel_mapel');
            $table->char('kode_mapel');
            $table->string('mata_pelajaran');
            $table->integer('kkm');
            $table->char('id_personil')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kbm_per_rombels');
    }
};
