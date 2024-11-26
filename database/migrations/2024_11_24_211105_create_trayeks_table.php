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
        Schema::create('trayeks', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable(); // Kolom nama
            $table->boolean('active_st')->default(true); // Kolom active_st dengan default true
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trayeks');
    }
};
