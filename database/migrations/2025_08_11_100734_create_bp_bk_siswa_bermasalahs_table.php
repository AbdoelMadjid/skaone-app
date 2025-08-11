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
        Schema::create('bp_bk_siswa_bermasalahs', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('semester');
            $table->date('tanggal');
            $table->string('nis');
            $table->string('rombel');
            $table->string('jenis_kasus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bp_bk_siswa_bermasalahs');
    }
};
