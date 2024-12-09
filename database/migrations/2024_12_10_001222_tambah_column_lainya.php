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
        Schema::table('sk_pengawasans', function (Blueprint $table) {
            $table->string('no_uji_kendaraan')->nullable();
            $table->string('sk_trayek_sebelumnya')->nullable();
            $table->string('sk_pengawasan_terakhir')->nullable();
            $table->string('fc_jasa_raharja')->nullable();
            $table->string('fc_kir')->nullable();
            $table->string('fc_stnk')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sk_pengawasans', function (Blueprint $table) {
            //
        });
    }
};
