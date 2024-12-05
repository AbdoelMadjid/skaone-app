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
        Schema::create('mata_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->char('kelompok');
            $table->char('kode');
            $table->char('nourut');
            $table->string('kel_mapel');
            $table->string('mata_pelajaran');
            $table->string('inisial_mp');
            $table->boolean('semester_1');
            $table->boolean('semester_2');
            $table->boolean('semester_3');
            $table->boolean('semester_4');
            $table->boolean('semester_5');
            $table->boolean('semester_6');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_pelajarans');
    }
};
