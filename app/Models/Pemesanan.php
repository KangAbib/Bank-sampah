<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $table = 'pemesanan';

    protected $fillable = [
        'id_pelanggan',
        'id_produk',
        'harga',
        'tipe',
        'deskripsi',
        'gambar',
        'telepon',
        'kota',
        'alamat',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function produk()
    {
        return $this->belongsTo(Product::class, 'id_produk');
    }
}
