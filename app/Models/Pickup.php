<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pickup extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pickup';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fullname',
        'tipe',
        'harga',
        'berat',
        'tanggal_penjemputan',
        'alamat',
        'catatan'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal_penjemputan' => 'date',
    ];

    /**
     * Get the type product that owns the pickup.
     */
    public function typeProduct()
    {
        return $this->belongsTo(TypeProduct::class, 'tipe');
    }
}
