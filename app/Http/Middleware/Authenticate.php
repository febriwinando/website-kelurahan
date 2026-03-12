<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {

            // Catat percobaan akses tanpa login
            Log::warning('Percobaan akses tanpa login', [
                'url' => $request->url(),
                'ip' => $request->ip(),
                'method' => $request->method(),
                'user_agent' => $request->userAgent(),
                'time' => now()
            ]);

            return '/masuk';
        }

        return null;
    }
}