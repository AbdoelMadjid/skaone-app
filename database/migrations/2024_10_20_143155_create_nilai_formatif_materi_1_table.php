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
        Schema::create('nilai_formatif_materi_1', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('kode_rombel');
            $table->string('kode_mapel');
            $table->string('id_personil');
            $table->string('nis');
            $table->string('materi_1');

            // Task points and corresponding values
            $table->string('materi_1_tp_1')->nullable();
            $table->decimal('materi_1_tp_1_nilai', 5, 2)->nullable();

            $table->string('materi_1_tp_2')->nullable();
            $table->decimal('materi_1_tp_2_nilai', 5, 2)->nullable();

            $table->string('materi_1_tp_3')->nullable();
            $table->decimal('materi_1_tp_3_nilai', 5, 2)->nullable();

            $table->string('materi_1_tp_4')->nullable();
            $table->decimal('materi_1_tp_4_nilai', 5, 2)->nullable();

            $table->string('materi_1_tp_5')->nullable();
            $table->decimal('materi_1_tp_5_nilai', 5, 2)->nullable();

            $table->string('materi_1_tp_6')->nullable();
            $table->decimal('materi_1_tp_6_nilai', 5, 2)->nullable();

            $table->decimal('materi_1_rerata', 5, 2)->nullable(); // Average score for materi 1

            $table->timestamps(); // Created and Updated at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_formatif_materi_1');
    }
};
