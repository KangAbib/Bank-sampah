<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(TypeProductSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PelangganSeeder::class);
        // Panggil seeder lainnya jika ada
    }
}
