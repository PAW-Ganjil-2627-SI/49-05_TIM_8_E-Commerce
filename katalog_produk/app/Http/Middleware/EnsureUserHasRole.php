<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
sysfony\Component\HttpFoundation\Response; 

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $user = $request->user();

        if (! $user || ! in_array($user->role, $roles, true)) {
            abort(403, 'Akses ditolak. Halaman ini khusus untuk Admin.');
        }

        return $next($request);
    }
}