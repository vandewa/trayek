<?php

namespace Database\Seeders;

use App\Models\Kepala;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KepalaDinasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepalas')->truncate();
        $code = Kepala::create(["id" => "1", "nama" => "AGUS SUSANTO, S.H., M.M.", "nip" => "196906251991021001"]);
    }
}
