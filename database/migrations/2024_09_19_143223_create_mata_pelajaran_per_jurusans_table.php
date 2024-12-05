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
        Schema::create('mata_pelajaran_per_jurusans', function (Blueprint $table) {
            $table->id();
            $table->char('kode_kk');
            $table->string('kel_mapel');
            $table->string('kode_mapel');
            $table->string('mata_pelajaran');
            $table->boolean('semester_1');
            $table->boolean('semester_2');
            $table->boolean('semester_3');
            $table->boolean('semester_4');
            $table->boolean('semester_5');
            $table->boolean('semester_6');
            $table->timestamps();

            // Tambahkan foreign key dengan onDelete cascade
            //$table->foreign('kel_mapel')->references('kel_mapel')->on('mata_pelajarans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajar_per_jurusans');
    }
};
