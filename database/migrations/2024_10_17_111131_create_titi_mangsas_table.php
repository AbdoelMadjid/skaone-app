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
        Schema::create('titi_mangsas', function (Blueprint $table) {
            $table->id();
            $table->char('kode_rombel');
            $table->char('tahunajaran');
            $table->char('ganjilgenap');
            $table->char('semester');
            $table->char('alamat');
            $table->date('titimangsa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('titi_mangsas');
    }
};
