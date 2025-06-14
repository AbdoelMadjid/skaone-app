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
        Schema::create('pilih_arsip_wali_kelas', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('tahunajaran');
            $table->string('kode_kk');
            $table->string('tingkat');
            $table->string('kode_rombel');
            $table->string('ganjilgenap');
            $table->string('pilih_dokumen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_arsip_wali_kelas');
    }
};
