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
        Schema::create('materi_ajars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rombel');
            $table->string('kode_mapel');
            $table->string('id_personil');
            $table->string('kode_cp');
            $table->string('materi_kode');
            $table->char('nomor_materi');
            $table->text('materi_isi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materi_ajars');
    }
};
