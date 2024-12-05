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
        Schema::create('peserta_didiks', function (Blueprint $table) {
            $table->id();
            $table->char('nis')->index('nis');
            $table->char('nisn', 15);
            $table->char('thnajaran_masuk');
            $table->char('kode_kk');
            $table->string('nama_lengkap');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->char('jenis_kelamin')->nullable();
            $table->string('agama')->nullable();
            $table->char('status_dalam_kel')->nullable();
            $table->integer('anak_ke')->nullable();
            $table->string('sekolah_asal')->nullable();
            $table->integer('diterima_kelas')->nullable();
            $table->date('diterima_tanggal')->nullable();
            $table->char('asalsiswa')->nullable();
            $table->string('keterangan_pindah')->nullable();
            $table->string('alamat_blok')->nullable();
            $table->char('alamat_norumah')->nullable();
            $table->char('alamat_rt')->nullable();
            $table->char('alamat_rw')->nullable();
            $table->string('alamat_desa')->nullable();
            $table->string('alamat_kec')->nullable();
            $table->string('alamat_kab')->nullable();
            $table->char('alamat_kodepos')->nullable();
            $table->char('kontak_telepon')->nullable();
            $table->char('kontak_email')->nullable();
            $table->string('foto')->nullable();
            $table->char('status')->nullable();
            $table->string('alasan_status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didiks');
    }
};
