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
        Schema::create('personil_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->char('id_personil')->index('id_personil');
            $table->char('nip')->nullable();
            $table->string('gelardepan')->nullable();
            $table->string('namalengkap');
            $table->string('gelarbelakang')->nullable();
            $table->char('jeniskelamin');
            $table->char('jenispersonil');
            $table->string('tempatlahir');
            $table->date('tanggallahir');
            $table->string('agama');
            $table->string('kontak_email');
            $table->string('kontak_hp');
            $table->string('photo')->nullable();
            $table->char('aktif');
            $table->string('alamat_blok')->nullable();
            $table->string('alamat_nomor')->nullable();
            $table->string('alamat_rt')->nullable();
            $table->string('alamat_rw')->nullable();
            $table->string('alamat_desa')->nullable();
            $table->string('alamat_kec')->nullable();
            $table->string('alamat_kab')->nullable();
            $table->string('alamat_prov')->nullable();
            $table->string('alamat_kodepos')->nullable();
            $table->string('bg_profil')->nullable(); // Background profil
            $table->string('motto_hidup')->nullable(); // Motto hidup
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personil_sekolahs');
    }
};
