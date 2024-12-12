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
        Schema::create('pilih_cetak_rapors', function (Blueprint $table) {
            $table->id();
            $table->string('id_personil');
            $table->string('tahunajaran');
            $table->string('semester');
            $table->string('kode_kk');
            $table->string('tingkat');
            $table->string('kode_rombel');
            $table->string('nis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_cetak_rapors');
    }
};
