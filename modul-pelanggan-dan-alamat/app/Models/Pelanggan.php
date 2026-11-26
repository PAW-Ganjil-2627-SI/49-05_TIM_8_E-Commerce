<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'data_pelanggan_dan_alamat';

    const CREATED_AT = null;
    const  UPDATED_AT = null;

    protected $fillable = ['nama', 'email', 'no_hp', 'jenis_kelamin', 'alamat_pengiriman'];
}
