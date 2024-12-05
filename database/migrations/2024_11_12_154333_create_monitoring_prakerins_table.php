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
        Schema::create('monitoring_prakerins', function (Blueprint $table) {
            $table->id();
            $table->char('id_perusahaan');
            $table->char('id_personil');
            $table->date('tgl_monitoring');
            $table->text('catatan_monitoring');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monitoring_prakerins');
    }
};
