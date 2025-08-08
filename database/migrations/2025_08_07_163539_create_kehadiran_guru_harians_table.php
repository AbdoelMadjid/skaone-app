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
        Schema::create('kehadiran_guru_harians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_mingguan_id')->constrained()->onDelete('cascade');
            $table->string('id_personil'); // redundan, tapi bisa dipakai indexing cepat
            $table->string('hari'); // contoh: 'Senin'
            $table->date('tanggal');
            $table->integer('jam_ke'); // 1 s.d. 13
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadiran_guru_harians');
    }
};
