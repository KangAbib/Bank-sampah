<?php

namespace Database\Seeders;

use App\Models\TypeProduct;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $types = [
            'Gelas Plastik',
            'Gelas Kayu',
            'Mangkuk Plastik',
            'Mangkuk Kayu',
            'Sendok Plastik',
            'Sendok Kayu',
            'Piring Plastik',
            'Piring Kayu',
            'Botol Plastik',
            'Botol Kaca',
        ];

        foreach ($types as $typeName) {
            TypeProduct::create([
                'kd_tipe' => Str::uuid(),
                'name' => $typeName,
            ]);
        }
    }
}
