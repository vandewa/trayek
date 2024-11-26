<?php

namespace Database\Seeders;

use App\Models\ComCode as Code;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('com_codes')->truncate();
        $code = Code::create(["com_cd" => "PENGAJUAN_TP_01", "code_nm" => "Disetujui", "code_group" => "PENGAJUAN_TP"]);
        $code = Code::create(["com_cd" => "PENGAJUAN_TP_02", "code_nm" => "Ditolak", "code_group" => "PENGAJUAN_TP"]);
    }
}
