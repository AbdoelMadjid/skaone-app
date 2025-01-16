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
        Schema::create('milih_data', function (Blueprint $table) {
            $table->id();
            $table->string('id_personil');
            $table->string('tahunajaran');
            $table->string('semester');
            $table->string('kode_kk');
            $table->string('tingkat');
            $table->string('kode_rombel');
            $table->string('id_siswa');
            $table->string('id_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('milih_data');
    }
};
