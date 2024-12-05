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
        Schema::create('nilai_sumatif', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rombel');
            $table->string('kode_mapel');
            $table->string('id_personil');
            $table->string('nis');
            $table->string('materi_1')->nullable();
            $table->decimal('materi_1_nilai', 5, 2)->nullable();
            $table->string('materi_2')->nullable();
            $table->decimal('materi_2_nilai', 5, 2)->nullable();
            $table->string('materi_3')->nullable();
            $table->decimal('materi_3_nilai', 5, 2)->nullable();
            $table->string('materi_4')->nullable();
            $table->decimal('materi_4_nilai', 5, 2)->nullable();
            $table->string('materi_5')->nullable();
            $table->decimal('materi_6_nilai', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sumatif');
    }
};
