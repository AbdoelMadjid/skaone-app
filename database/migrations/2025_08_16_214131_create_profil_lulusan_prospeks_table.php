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
        Schema::create('profil_lulusan_prospeks', function (Blueprint $table) {
            $table->id();
            $table->string('id_kk'); // relasi ke kompetensi_keahlians.id_kk
            $table->enum('tipe', ['profil_lulusan', 'prospek_kerja']);
            $table->text('deskripsi'); // isi checklist/teks
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_lulusan_prospeks');
    }
};
