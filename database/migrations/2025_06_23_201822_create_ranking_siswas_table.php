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
        Schema::create('ranking_siswas', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('ganjilgenap');
            $table->string('kode_kk');
            $table->string('rombel_kode');
            $table->string('rombel_nama');
            $table->integer('tingkat');
            $table->string('nis');
            $table->string('nama_lengkap');
            $table->decimal('nilai_rata2', 5, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranking_siswas');
    }
};
