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
        Schema::create('ekstrakurikulers', function (Blueprint $table) {
            $table->id();
            $table->char('kode_rombel');
            $table->char('tahunajaran');
            $table->char('ganjilgenap');
            $table->char('semester');
            $table->char('nis');
            $table->char('wajib')->nullable();
            $table->char('wajib_n')->nullable();
            $table->char('wajib_desk')->nullable();
            $table->char('pilihan1')->nullable();
            $table->char('pilihan1_n')->nullable();
            $table->char('pilihan1_desk')->nullable();
            $table->char('pilihan2')->nullable();
            $table->char('pilihan2_n')->nullable();
            $table->char('pilihan2_desk')->nullable();
            $table->char('pilihan3')->nullable();
            $table->char('pilihan3_n')->nullable();
            $table->char('pilihan3_desk')->nullable();
            $table->char('pilihan4')->nullable();
            $table->char('pilihan4_n')->nullable();
            $table->char('pilihan4_desk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ekstrakurikulers');
    }
};
