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
        Schema::create('kompetensi_keahlians', function (Blueprint $table) {
            $table->char('idkk', 20)->primary();
            $table->string('id_bk');
            $table->string('id_pk');
            $table->string('nama_kk');
            $table->string('singkatan');
            $table->timestamps();

            $table->foreign('id_bk')->references('idbk')->on('bidang_keahlians')->onDelete('cascade');
            $table->foreign('id_pk')->references('idpk')->on('program_keahlians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompetensi_keahlians');
    }
};
