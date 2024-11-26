<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('perusahaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(); // Kolom nama dengan nullable
            $table->string('pemimpin')->nullable(); // Kolom peminpin dengan nullable
            $table->string('telepon')->nullable(); // Kolom telepon dengan nullable
            $table->text('alamat')->nullable(); // Kolom alamat dengan nullable
            $table->string('sk')->nullable(); // Kolom sk dengan nullable
            $table->string('tahun')->nullable(); // Kolom tahun dengan nullable
            $table->boolean('active_st')->default(true); // Kolom active_st dengan default true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaans');
    }
};
