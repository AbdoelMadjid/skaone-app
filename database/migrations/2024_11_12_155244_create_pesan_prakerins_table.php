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
        Schema::create('pesan_prakerins', function (Blueprint $table) {
            $table->id();
            $table->char('sender_id');
            $table->char('receiver_id');
            $table->text('message');
            $table->enum('read_status', ['BELUM', 'SUDAH']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesan_prakerins');
    }
};
