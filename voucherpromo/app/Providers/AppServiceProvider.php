<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Izin bernama: hanya admin yang boleh melihat rekap voucher
        Gate::define('lihat-rekap-voucher', fn (User $user) => $user->hasRole('admin'));
    }
}
