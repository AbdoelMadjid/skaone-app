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
        Schema::create('program_keahlians', function (Blueprint $table) {
            $table->char('idpk', 20)->primary();
            $table->string('id_bk');
            $table->string('nama_pk');
            $table->timestamps();

            $table->foreign('id_bk')->references('idbk')->on('bidang_keahlians')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program_keahlians');
    }
};
