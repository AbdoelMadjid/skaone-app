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
        Schema::create('prakerin_admin_negos', function (Blueprint $table) {
            $table->id();
            $table->string('tahunajaran');
            $table->string('id_perusahaan');
            $table->string('nomor_surat');
            $table->string('titimangsa');
            $table->string('id_nego');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prakerin_admin_negos');
    }
};
