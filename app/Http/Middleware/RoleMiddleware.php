<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // pastikan sudah login
        if (! auth()->check()) {
            return redirect()->route('login');
        }

        // cek role user
        $user = auth()->user();

        // misal kolom di tabel users adalah level atau role
        // contohnya: $user->level
        if (! in_array($user->level, $roles)) {
            abort(403, 'Unauthorized.');
        }

        return $next($request);
    }
}
