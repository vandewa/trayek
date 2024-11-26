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
        Schema::create('sk', function (Blueprint $table) {
            $table->id();
            $table->string('nomor')->nullable(); // Kolom nomor, nullable
            $table->unsignedBigInteger('perusahaan_id')->nullable(); // Kolom perusahaan_id, nullable
            $table->date('tanggal_sk')->nullable(); // Kolom tanggal_sk, nullable
            $table->unsignedBigInteger('trayek_id')->nullable(); // Kolom trayek_id, nullable
            $table->date('tanggal_mulai_berlaku')->nullable(); // Kolom tanggal_mulai_berlaku, nullable
            $table->date('tanggal_selesai_berlaku')->nullable(); // Kolom tanggal_selesai_berlaku, nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sk');
    }
};
