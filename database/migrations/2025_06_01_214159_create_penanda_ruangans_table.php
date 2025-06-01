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
        Schema::create('penanda_ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_ruang'); // contoh: R01, R02
            $table->integer('x')->default(0); // posisi X di atas gambar
            $table->integer('y')->default(0); // posisi Y di atas gambar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penanda_ruangans');
    }
};
