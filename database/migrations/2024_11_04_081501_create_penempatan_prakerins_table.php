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
        Schema::create('penempatan_prakerins', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('kode_kk');
            $table->string('nis');
            $table->string('id_dudi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penempatan_prakerins');
    }
};
