<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();

        $data = [
            [
                'name' => 'Superadmin',
                'email' => 'https://github.com/vandewa/trayek.git',
                'password' => bcrypt('password'),
            ]
        ];

        foreach ($data as $datum) {
            User::create($datum);
        }
    }
}
