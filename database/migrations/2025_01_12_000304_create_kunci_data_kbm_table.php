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
        Schema::create('kunci_data_kbm', function (Blueprint $table) {
            $table->id();
            $table->string('id_personil');
            $table->string('tahunajaran');
            $table->string('ganjilgenap');
            $table->string('semester');
            $table->string('kode_kk');
            $table->string('tingkat');
            $table->string('kode_rombel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kunci_data_kbm');
    }
};
