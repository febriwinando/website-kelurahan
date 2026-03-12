<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
{
    if (Auth::check()) {

        // jika sudah login tapi belum lolos 2FA
        if (Auth::user()->google2fa_enabled && !session('2fa_passed')) {
            return $next($request);
        }

        // jika sudah login dan lolos 2FA
        if (session('2fa_passed')) {
            return redirect('/anggota');
        }
    }

    return $next($request);
}
}