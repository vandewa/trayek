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
        Schema::create('sk_pengawasans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable(); // Kolom nomor, nullable
            $table->date('tanggal_sk')->nullable(); // Kolom tanggal_sk, nullable
            $table->unsignedBigInteger('sk_id')->nullable(); // Kolom sk_id, nullable
            $table->unsignedBigInteger('kendaraan_id')->nullable(); // Kolom kendaraan_id, nullable
            $table->date('tanggal_mulai_berlaku')->nullable(); // Kolom tanggal_mulai_berlaku, nullable
            $table->date('tanggal_selesai_berlaku')->nullable(); // Kolom tanggal_selesai_berlaku, nullable
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
        Schema::dropIfExists('sk_pengawasans');
    }
};
