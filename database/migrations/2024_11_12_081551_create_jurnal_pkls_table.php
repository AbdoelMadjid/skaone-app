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
        Schema::create('jurnal_pkls', function (Blueprint $table) {
            $table->id();
            $table->string('id_penempatan');
            $table->date('tanggal_kirim')->nullable();
            $table->string('element')->nullable();
            $table->string('id_tp')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('gambar')->nullable();
            $table->string('validasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_pkls');
    }
};
