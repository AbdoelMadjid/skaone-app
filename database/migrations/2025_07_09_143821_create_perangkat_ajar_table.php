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
        Schema::create('perangkat_ajar', function (Blueprint $table) {
            $table->id();
            $table->string('id_personil');
            $table->string('tahunajaran');
            $table->string('semester');
            $table->string('doc_cp')->nullable();
            $table->string('doc_tp')->nullable();
            $table->string('doc_rpp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perangkat_ajar');
    }
};
