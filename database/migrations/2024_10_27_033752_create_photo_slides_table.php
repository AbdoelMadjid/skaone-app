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
        Schema::create('photo_slides', function (Blueprint $table) {
            $table->id();
            $table->string('gambar')->nullable(); // untuk menyimpan path gambar
            $table->string('alt_text')->nullable(); // teks alternatif untuk aksesibilitas
            $table->integer('interval')->default(2000); // interval waktu untuk tampilan
            $table->boolean('is_active')->default(true); // status slide aktif atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photo_slides');
    }
};
