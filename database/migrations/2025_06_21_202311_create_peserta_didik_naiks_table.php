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
        Schema::create('peserta_didik_naiks', function (Blueprint $table) {
            $table->id();
            $table->char('kode_rombel');
            $table->char('tahunajaran');
            $table->char('nis');
            $table->enum('status', ['Naik', 't']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didik_naiks');
    }
};
