<?php

namespace App\Providers;

use App\Models\User;
use App\Models\VoucherDiskon;
use App\Policies\VoucherDiskonPolicy;
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
        // Daftarkan Policy secara eksplisit (model VoucherDiskon -> VoucherDiskonPolicy)
        Gate::policy(VoucherDiskon::class, VoucherDiskonPolicy::class);

        // Gate: hanya admin yang boleh melihat rekap voucher
        Gate::define('lihat-rekap-voucher', fn (User $user) => $user->hasRole('admin'));
    }
}