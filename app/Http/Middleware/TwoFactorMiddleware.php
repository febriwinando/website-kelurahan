<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TwoFactorMiddleware
{

    public function handle($request, Closure $next)
    {

        if (Auth::check()) {

            if (
                Auth::user()->google2fa_enabled &&
                !session('2fa_passed')
            ) {
                return redirect('/masuk');
            }

        }

        return $next($request);
    }
}
