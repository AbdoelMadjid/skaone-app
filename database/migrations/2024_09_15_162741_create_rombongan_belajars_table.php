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
        Schema::create('rombongan_belajars', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('id_kk');
            $table->integer('tingkat');
            $table->string('singkatan_kk');
            $table->integer('pararel');
            $table->string('rombel');
            $table->string('kode_rombel');
            $table->string('wali_kelas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rombongan_belajars');
    }
};
