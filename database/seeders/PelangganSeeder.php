<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pelanggan')->insert([
            [
                'username' => 'johndoe',
                'password' => Hash::make('password123'),
                'fullname' => 'John Doe',
                'alamat' => 'Jl. Sudirman No.1, Jakarta',
                'telepon' => '08123456789',
                'kota' => 'Jakarta',
            ],
            ]);
        }
}
