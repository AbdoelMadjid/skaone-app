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
        Schema::create('wakil_kepala_sekolahs', function (Blueprint $table) {
            $table->id();
            $table->string('jabatan');
            $table->string('namalengkap');
            $table->char('mulai_tahun');
            $table->char('akhir_tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wakil_kepala_sekolahs');
    }
};
