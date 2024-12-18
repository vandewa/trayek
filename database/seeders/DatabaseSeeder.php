<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LaratrustSeeder::class);
        $this->call(ComCodeSeeder::class);
        $this->call(KepalaDinasSeeder::class);
        $this->call(PerusahaanSeeder::class);
        $this->call(TrayekSeeder::class);
        $this->call(KendaraanSeeder::class);
    }
}
