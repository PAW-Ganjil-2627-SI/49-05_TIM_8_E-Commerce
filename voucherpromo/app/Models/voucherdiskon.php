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

    // Ubah status voucher yang tanggal berlakunya sudah lewat menjadi 'nonaktif'.
    // Voucher masih berlaku sampai akhir hari pada tanggal 'berlaku'.
    // Mengembalikan jumlah voucher yang diubah.
    public static function nonaktifkanKedaluwarsa(): int
    {
        return static::where('status', 'aktif')
            ->whereDate('berlaku', '<', now()->toDateString())
            ->update(['status' => 'nonaktif']);
    }
}