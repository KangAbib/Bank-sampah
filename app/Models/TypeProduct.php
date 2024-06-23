<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeProduct extends Model
{
    use HasFactory;

    protected $table = 'type_product';

    protected $fillable = [
        'name'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'tipe');
    }

    public function Pickup()
    {
        return $this->hasMany(Pickup::class, 'tipe');
    }
}
