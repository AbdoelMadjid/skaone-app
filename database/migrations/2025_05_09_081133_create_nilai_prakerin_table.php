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
        Schema::create('nilai_prakerin', function (Blueprint $table) {
            $table->id();
            $table->char('tahun_ajaran');
            $table->char('nis');
            $table->char('cp1');
            $table->char('cp2');
            $table->char('cp3');
            $table->char('cp4');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_prakerin');
    }
};
