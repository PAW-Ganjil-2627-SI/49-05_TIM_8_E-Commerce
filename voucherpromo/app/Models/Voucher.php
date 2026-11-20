<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class Voucher extends Model
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
 
    protected $casts = [
        'berlaku' => 'date',
    ];
}