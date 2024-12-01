<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DataDummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Seeder untuk tabel trayeks
         DB::table('trayeks')->insert([
            [
                'nama' => 'Trayek A',
                'active_st' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Trayek B',
                'active_st' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Trayek C',
                'active_st' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Seeder untuk tabel perusahaans
        DB::table('perusahaans')->insert([
            [
                'nama' => 'Perusahaan A',
                'pemimpin' => 'John Doe',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Contoh Alamat 1',
                'sk' => '123/2024',
                'tahun' => '2024',
                'active_st' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Perusahaan B',
                'pemimpin' => 'Jane Smith',
                'telepon' => '081234567891',
                'alamat' => 'Jl. Contoh Alamat 2',
                'sk' => '124/2024',
                'tahun' => '2024',
                'active_st' => false,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        // Seeder untuk tabel kendaraans
        DB::table('kendaraans')->insert([
            [
                'no_kendaraan' => 'AB1234CD',
                'perusahaan_id' => 1,
                'kendaraan_st' => true,
                'pemilik' => 'Budi Santoso',
                'tahun_pembuatan' => 2020,
                'daya_angkut' => 15,
                'merek' => 'Toyota',
                'kelas_pelayanan' => 'Ekonomi',
                'no_uji_kendaraan' => 'UJI123',
                'sifat_perjalanan' => 'Reguler',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'no_kendaraan' => 'AB5678EF',
                'perusahaan_id' => 2,
                'kendaraan_st' => false,
                'pemilik' => 'Andi Wijaya',
                'tahun_pembuatan' => 2019,
                'daya_angkut' => 20,
                'merek' => 'Suzuki',
                'kelas_pelayanan' => 'Bisnis',
                'no_uji_kendaraan' => 'UJI124',
                'sifat_perjalanan' => 'Non-Reguler',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
