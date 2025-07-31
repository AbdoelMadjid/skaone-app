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
        Schema::create('prakerin_negosiators', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('id_personil');
            $table->string('gol_ruang');
            $table->string('id_nego');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prakerin_negosiators');
    }
};
