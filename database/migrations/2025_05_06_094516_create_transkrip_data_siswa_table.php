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
        Schema::create('transkrip_data_siswa', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_ajaran');
            $table->char('nis');
            $table->char('nisn');
            $table->char('kelas');
            $table->char('tempat_lahir');
            $table->date('tgl_lahir');
            $table->char('agama');
            $table->char('orangtua');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transkrip_data_siswa');
    }
};
