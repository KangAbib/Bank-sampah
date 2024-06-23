<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'nama',
        'harga',
        'tipe',
        'deskripsi',
        'gambar',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'id_produk');
    }

    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'tipe');
    }
}
