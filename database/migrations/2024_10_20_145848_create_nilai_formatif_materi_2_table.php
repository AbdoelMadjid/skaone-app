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
        Schema::create('nilai_formatif_materi_2', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rombel');
            $table->string('kode_mapel');
            $table->string('id_personil');
            $table->string('nis');
            $table->string('materi_2');

            // Task points and corresponding values
            $table->string('materi_2_tp_1')->nullable();
            $table->decimal('materi_2_tp_1_nilai', 5, 2)->nullable();

            $table->string('materi_2_tp_2')->nullable();
            $table->decimal('materi_2_tp_2_nilai', 5, 2)->nullable();

            $table->string('materi_2_tp_3')->nullable();
            $table->decimal('materi_2_tp_3_nilai', 5, 2)->nullable();

            $table->string('materi_2_tp_4')->nullable();
            $table->decimal('materi_2_tp_4_nilai', 5, 2)->nullable();

            $table->string('materi_2_tp_5')->nullable();
            $table->decimal('materi_2_tp_5_nilai', 5, 2)->nullable();

            $table->string('materi_2_tp_6')->nullable();
            $table->decimal('materi_2_tp_6_nilai', 5, 2)->nullable();

            $table->decimal('materi_2_rerata', 5, 2)->nullable(); // Average score for materi 1
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_formatif_materi_2');
    }
};
