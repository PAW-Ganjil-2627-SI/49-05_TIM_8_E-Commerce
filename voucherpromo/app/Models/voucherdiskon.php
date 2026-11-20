<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VoucherDiskon extends Model
{
    protected $table = 'voucher_diskon';

    public $timestamps = false;

    protected $fillable = [
        'kode',
        'jenis',
        'nilai_diskon',
        'minimum_spend',
        'berlaku',
        'status',
    ];
}