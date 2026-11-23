<?php

namespace App\Policies;

use App\Models\User;
use App\Models\VoucherDiskon;
use Carbon\Carbon;

class VoucherDiskonPolicy
{
    // Boleh mengubah voucher INI?
    // admin: selalu boleh. kasir: hanya voucher yang belum kedaluwarsa.
    public function update(User $user, VoucherDiskon $voucher): bool
    {
        if ($user->hasRole('admin')) {
            return true;
        }

        return $user->hasRole('kasir')
            && Carbon::parse($voucher->berlaku)->endOfDay()->isFuture();
    }

    // Boleh menghapus voucher INI? (hanya admin)
    public function delete(User $user, VoucherDiskon $voucher): bool
    {
        return $user->hasRole('admin');
    }

    // Boleh mengubah kode, jenis, dan nilai diskon? (dipakai di controller dan form)
    public function ubahNilai(User $user, VoucherDiskon $voucher): bool
    {
        return $user->hasRole('admin');
    }
}