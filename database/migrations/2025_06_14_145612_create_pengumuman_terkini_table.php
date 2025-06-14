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
        Schema::create('pengumuman_terkini', function (Blueprint $table) {
            $table->id();
            $table->foreignId('judul_id')->constrained('pengumuman_judul')->onDelete('cascade');
            $table->integer('urutan');
            $table->string('judul');
            $table->timestamp('waktu_mulai');
            $table->timestamp('waktu_berakhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumuman_terkini');
    }
};
