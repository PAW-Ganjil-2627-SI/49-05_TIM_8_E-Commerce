<?php

namespace App\Policies;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PelangganPolicy
{
    public function create(User $user): bool
    {
        return $user->hasRole('admin', 'staff');
    }

    public function update(User $user, Pelanggan $pelanggan): bool
    {
        return $user->hasRole('admin');
    }

    public function delete(User $user, Pelanggan $pelanggan): bool
    {
        return $user->hasRole('admin');
    }

}
