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
        Schema::create('sk_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sk_id'); // Kolom sk_id
            $table->unsignedBigInteger('kendaraan_id'); // Kolom kendaraan_id
            $table->timestamps(); // Kolom created_at dan updated_at

            // Foreign key constraints (opsional, jika menggunakan relasi)
            $table->foreign('sk_id')->references('id')->on('sk')->onDelete('cascade');
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk_kendaraans');
    }
};
