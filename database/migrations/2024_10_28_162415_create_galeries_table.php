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
        Schema::create('galeries', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Nama file gambar
            $table->string('title')->nullable(); // Judul atau caption dari gambar
            $table->string('author')->nullable(); // Nama pembuat
            $table->string('category')->nullable(); // Nama pembuat
            $table->integer('likes')->default(0); // Jumlah suka
            $table->integer('comments')->default(0); // Jumlah komentar
            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_id')->constrained('galeries')->onDelete('cascade'); // ID gambar yang dikomentari
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // ID pengguna yang membuat komentar
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade'); // ID komentar induk
            $table->text('content'); // Isi komentar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeries');
        Schema::dropIfExists('comments');
    }
};
