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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_kendaraan')->nullable(); // Kolom nomor kendaraan, nullable
            $table->unsignedBigInteger('perusahaan_id')->nullable(); // Kolom perusahaan_id, nullable
            $table->boolean('kendaraan_st')->default(true); // Kolom kendaraan_st, default true
            $table->string('pemilik')->nullable(); // Kolom pemilik, nullable
            $table->integer('tahun_pembuatan')->nullable(); // Kolom tahun_pembuatan, nullable
            $table->integer('daya_angkut')->nullable(); // Kolom daya_angkut, nullable
            $table->string('merek')->nullable(); // Kolom merek, nullable
            $table->string('kelas_pelayanan')->nullable(); // Kolom kelas_pelayanan, nullable
            $table->string('no_uji_kendaraan')->nullable(); // Kolom no_uji_kendaraan, nullable
            $table->string('sifat_perjalanan')->nullable(); // Kolom sifat_perjalanan, nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
