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
        Schema::create('jam_mengajars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kbm_per_rombel_id')->constrained('kbm_per_rombels')->onDelete('cascade');
            $table->unsignedInteger('jumlah_jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jam_mengajars');
    }
};
