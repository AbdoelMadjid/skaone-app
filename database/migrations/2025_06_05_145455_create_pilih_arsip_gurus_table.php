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
        Schema::create('pilih_arsip_gurus', function (Blueprint $table) {
            $table->id();
            $table->string('id_user');
            $table->string('tahunajaran');
            $table->string('semester');
            $table->string('jenis_arsip');
            $table->string('id_guru');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pilih_arsip_gurus');
    }
};
