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
        Schema::create('team_pengembangs', function (Blueprint $table) {
            $table->id();
            $table->char('namalengkap');
            $table->char('jeniskelamin');
            $table->char('jabatan');
            $table->text('deskripsi')->nullable();
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_pengembangs');
    }
};
