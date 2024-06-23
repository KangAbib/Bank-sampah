<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'fullname', 'alamat', 'telepon', 'kota',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'pelanggan';

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pelanggan');
    }
}
