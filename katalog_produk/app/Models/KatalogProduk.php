<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KatalogProduk extends Model
{
    protected $table = 'katalog_produk';
    protected $primaryKey = 'id_produk';
    
    public $timestamps = false; 

    protected $fillable = [
        'Nama_produk',
        'Warna_produk',
        'Berat',
        'Merk'
    ];
}