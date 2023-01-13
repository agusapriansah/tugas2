<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produsen extends Model
{
    use HasFactory;

    protected $table = 'Produsen';
    protected $guarded = [];

    // Relasi ke Buku
    public function Produk()
    {
        return $this->hasOne(Produk::class, 'Produsen_id', 'id');
    }
}
