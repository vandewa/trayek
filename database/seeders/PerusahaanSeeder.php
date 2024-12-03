<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('perusahaans')->truncate();
        $data = [
            ['id' => 1, 'nama' => 'KOJATUM'],
            ['id' => 2, 'nama' => 'BANMAS'],
            ['id' => 3, 'nama' => 'KOJAMASA'],
            ['id' => 4, 'nama' => 'KOJATUM'],
            ['id' => 5, 'nama' => 'PT MITRA BISNIS SERASI'],
            ['id' => 6, 'nama' => 'BANGKIT MAJU BERSAMA'],
            ['id' => 7, 'nama' => 'PT CAHAYA ABADI AN NUR'],
            ['id' => 8, 'nama' => 'PRIUK JAYA TRANS'],
            ['id' => 9, 'nama' => 'PT CAHAYA KUSUMA SAKTI'],
            ['id' => 10, 'nama' => 'PT PRIOK JAYA TRANS'],
            ['id' => 11, 'nama' => 'MITRA BISNIS SERASI'],
            ['id' => 12, 'nama' => 'MARDI SISWA JAYA'],
            ['id' => 13, 'nama' => 'MORODADI'],
            ['id' => 14, 'nama' => 'PT. CAHAYA KUSUMA SAKTI'],
            ['id' => 15, 'nama' => 'PT. LERENG DIENG ABADI'],
            ['id' => 16, 'nama' => 'PT. TABAH BERKAH UTAMA'],
            ['id' => 17, 'nama' => 'P.O ANGKOT'],
            ['id' => 18, 'nama' => 'KOJATUM (SEMULA MITRA BISNIS SERASI)'],
            ['id' => 19, 'nama' => 'MITRA BISNIS SERASI'],
            ['id' => 20, 'nama' => 'LERENG DIENG ABADI'],
            ['id' => 21, 'nama' => 'MERAPI BINTANG PERSADA'],
            ['id' => 22, 'nama' => 'KSU. BANMAS'],
            ['id' => 23, 'nama' => 'PUTRA MADINAH SEJAHTERA'],
            ['id' => 24, 'nama' => 'KSU.BINTANG P'],
            ['id' => 25, 'nama' => 'KSU.BANGKIT MAJU BERSAMA'],
            ['id' => 26, 'nama' => 'BANGKIT MAJU BERSAMA'],
            ['id' => 27, 'nama' => 'ASSALAF (MATI)'],
            ['id' => 28, 'nama' => 'BM (MATI)'],
            ['id' => 29, 'nama' => 'CAHAYA INDAH (MATI)'],
            ['id' => 30, 'nama' => 'KOJATUM (MATI)'],
            ['id' => 31, 'nama' => 'ANGKUDES'],
            ['id' => 32, 'nama' => 'CAHAYA KUSUMA SAKTI'],
            ['id' => 33, 'nama' => 'ANGKUDES'],
            ['id' => 34, 'nama' => 'KOP TRANSPORTASI ANJANA'],
            ['id' => 35, 'nama' => 'PERINTIS'],
            ['id' => 36, 'nama' => 'TANAH MERAH'],
            ['id' => 37, 'nama' => 'ANGKUDES (DIALIHKAN KERTEK-BALEKAMBNG-SLMTRO)'],
            ['id' => 38, 'nama' => 'ANGKUDES (DIBEKUKAN)'],
            ['id' => 39, 'nama' => 'PT PUTRI JAYA LESTARI'],
            ['id' => 40, 'nama' => 'GONDANG (KOJATUM)'],
            ['id' => 41, 'nama' => 'ANGKUDES(MATI)'],
            ['id' => 42, 'nama' => 'HANDOKO PUTRA MANDIRI'],
            ['id' => 43, 'nama' => 'DEWI'],
            ['id' => 44, 'nama' => 'JAWA TRANS CORP'],
            ['id' => 45, 'nama' => 'MAHAMERU'],
            ['id' => 46, 'nama' => 'PUTRO WIGATI'],
            ['id' => 47, 'nama' => 'MARGO REJEKI'],
            ['id' => 48, 'nama' => 'SETYO WARNO'],
            ['id' => 49, 'nama' => 'SURYA'],
            ['id' => 50, 'nama' => 'AJI JAYA'],
            ['id' => 51, 'nama' => 'DAFIRA TRANS WONOSOBO'],
            ['id' => 52, 'nama' => 'ANDINI'],
            ['id' => 53, 'nama' => 'BUANA SAKTI'],
            ['id' => 54, 'nama' => 'BISMA JAYA'],
            ['id' => 55, 'nama' => 'ASIA GRUP'],
            ['id' => 56, 'nama' => 'BUKIT INDAH'],
            ['id' => 57, 'nama' => 'BISMA SAKTI'],
            ['id' => 58, 'nama' => 'TABAH BERKAH UTAMA'],
            ['id' => 59, 'nama' => 'PT LERENG DIENG ABADI'],
            ['id' => 60, 'nama' => 'LUMBUNG ARTA MAS'],
            ['id' => 61, 'nama' => 'DUTA SARANA'],
            ['id' => 62, 'nama' => 'DIENG ARTA MAS'],
            ['id' => 63, 'nama' => 'ANGKUDES (DIBEKUKAN)'],
        ];

        DB::table('perusahaans')->insert($data);
    }
}
