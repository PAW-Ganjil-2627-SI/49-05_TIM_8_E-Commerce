<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Voucher;
use Carbon\Carbon;

class VoucherPolicy
{
    // Boleh mengubah voucher INI?
    // admin: selalu boleh. kasir: hanya voucher yang belum kedaluwarsa.
    public function update(User $user, Voucher $VoucherDiskon): bool
    {
        if ($user->hasRole('admin')) {
            return true;    
        }

        return $user->hasRole('kasir')
            && Carbon::parse($voucher->berlaku)->endOfDay()->isFuture();
    }

    // Boleh menghapus voucher INI? (hanya admin)
    public function delete(User $user, Voucher $VoucherDiskon): bool
    {
        return $user->hasRole('admin');
    }

    // Boleh mengubah kode, jenis, dan nilai diskon? (dipakai di Langkah 7.2)
    public function ubahNilai(User $user, Voucher $VoucherDiskon): bool
    {
        return $user->hasRole('admin');
    }
}