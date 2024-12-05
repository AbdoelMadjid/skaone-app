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
        Schema::create('prestasi_siswas', function (Blueprint $table) {
            $table->id();
            $table->char('kode_rombel');
            $table->char('tahunajaran');
            $table->char('ganjilgenap');
            $table->char('semester');
            $table->char('nis');
            $table->char('jenis');
            $table->char('tingkat');
            $table->char('juarake');
            $table->char('namalomba');
            $table->date('tanggal');
            $table->text('tempat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestasi_siswas');
    }
};
