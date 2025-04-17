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
        Schema::create('exam_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('nama_ujian');
            $table->string('kelas');
            $table->string('mata_pelajaran');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->time('jam_mulai')->nullable(); // hanya dipakai jika tanggal mulai == tanggal selesai
            $table->time('jam_selesai')->nullable();
            $table->string('link_soal'); // link ke soal ujian
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_schedules');
    }
};
