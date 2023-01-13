<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'Produk';
    protected $guarded = [];

    // Relasi ke Penerbit
    public function Produsen()
    {
        return $this->belongsTo(Produsen::class, 'Produsen_id', 'id');
    } 
    
}