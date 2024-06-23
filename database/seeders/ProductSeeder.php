<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $randomImages = [
            'https://m.media-amazon.com/images/I/41WpqIvJWRL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61ghDjhS8vL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61c1QC4lF-L._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/710VzyXGVsL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61EPT-oMLrL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71r3ktfakgL._AC_UY436_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61CqYq+xwNL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71cVOgvystL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71E+oh38ZqL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/61uSHBgUGhL._AC_UL640_QL65_.jpg',
            'https://m.media-amazon.com/images/I/71nDK2Q8HAL._AC_UL640_QL65_.jpg'
        ];
        // Generate 50 products

        for ($i = 0; $i < 50; $i++) {
            $imageUrl = $randomImages[rand(0, 10)];
            $imageContent = Http::get($imageUrl)->body();

            $imageName = basename($imageUrl);
            Storage::disk('public')->put('gambar/' . $imageName, $imageContent);

            Product::create([
                'id_produk' => Str::uuid(),
                'nama' => 'Product ' . ($i + 1),
                'harga' => rand(10, 100) * 1000,
                'tipe' => rand(1, 10),
                'deskripsi' => 'Deskripsi produk ' . ($i + 1),
                'gambar' => 'storage/gambar/' . $imageName
            ]);
        }
    }
}
