<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmailVerification
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || $request->routeIs('verification.notice')) {
            return $next($request);
        }

        if (!auth()->user()->hasVerifiedEmail()) {
            return redirect()->route("verification.notice");
        }

        return $next($request);
    }
}
