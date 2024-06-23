<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class PelangganMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::guard('pelanggan')->check()) {
            return $next($request);
        }

        return redirect()->route('login.index')->with('redirectTo', $request->url());
    }
}
