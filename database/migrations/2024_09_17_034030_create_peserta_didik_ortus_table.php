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
        Schema::create('peserta_didik_ortus', function (Blueprint $table) {
            $table->id();
            $table->char('nis', 15)->index('nis');
            $table->char('status')->nullable();
            $table->string('nm_ayah')->nullable();
            $table->string('nm_ibu')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
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
            $table->timestamps();

            $table->foreign('nis')->references('nis')->on('peserta_didiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didik_ortus');
    }
};
