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
        Schema::create('nilai_sumatif_akhir_semester', function (Blueprint $table) {
            $table->id();
            $table->string('kode_rombel');
            $table->string('kode_mapel');
            $table->string('id_personil');
            $table->string('nis');
            $table->decimal('nilai_sas', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_sumatif_akhir_semester');
    }
};
