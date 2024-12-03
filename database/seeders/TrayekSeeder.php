<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TrayekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trayeks')->truncate();
        $data = [
            ['id' => 1, 'nama' => 'WONOSOBO-KERTEK'],
            ['id' => 2, 'nama' => 'WONOSOBO-SAWANGAN'],
            ['id' => 3, 'nama' => 'WONOSOBO-LEKSONO'],
            ['id' => 4, 'nama' => 'WONOSOBO-GARUNG'],
            ['id' => 5, 'nama' => 'WONOSOBO-MOJOTENGAH'],
            ['id' => 6, 'nama' => 'WONOSOBO-LIMBANGAN'],
            ['id' => 7, 'nama' => 'WONOSOBO-GONDANG'],
            ['id' => 8, 'nama' => 'WONOSOBO-ANDONGSILI-KESENENG'],
            ['id' => 9, 'nama' => 'WONOSOBO-WONOLELO'],
            ['id' => 10, 'nama' => 'WONOSOBO-PACARMULYO-GONDANG'],
            ['id' => 11, 'nama' => 'WONOSOBO-MADUKORO-KESENENG'],
            ['id' => 12, 'nama' => 'KERTEK-KEMBARAN'],
            ['id' => 13, 'nama' => 'KERTEK-BALEKAMBANG-SELOMERTO'],
            ['id' => 14, 'nama' => 'SAWANGAN-SEMPOL'],
            ['id' => 15, 'nama' => 'SWG-SAPURAN/LAMUK'],
            ['id' => 16, 'nama' => 'GARUNG-MENJER'],
            ['id' => 17, 'nama' => 'WONOSOBO-TIMBANG-WONOKASIAN'],
            ['id' => 18, 'nama' => 'KALIWIRO-WADASLINTANG'],
            ['id' => 19, 'nama' => 'SAWANGAN-TLOGO'],
            ['id' => 20, 'nama' => 'LEKSONO-KORIPAN-WATUMALANG'],
            ['id' => 21, 'nama' => 'SAPURAN-KALIBAWANG-KALIWIRO'],
            ['id' => 22, 'nama' => 'WONOSOBO-DERO'],
            ['id' => 23, 'nama' => 'WONOSOBO-BANSRI-SOJOPURO'],
            ['id' => 24, 'nama' => 'PETIR KRINJING'],
            ['id' => 25, 'nama' => 'WONOSOBO - WADASLINTANG'],
            ['id' => 26, 'nama' => 'WONOSOBO - WATUMALANG'],
            ['id' => 27, 'nama' => 'WONOSOBO - DIENG'],
            ['id' => 28, 'nama' => 'WONOSOBO - KEPIL'],
            ['id' => 29, 'nama' => 'SAPURAN-KEPIL-CAWANGAN-TEGESWETAN'],
        ];

        DB::table('trayeks')->insert($data);
    }
}
