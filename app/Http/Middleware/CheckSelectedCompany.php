<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSelectedCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->routeIs('dashboard.showUserCompanyDashboard') ||
            $request->routeIs('dashboard.selectCompany') ||
            $request->routeIs('user.logout')
        ) {
            return $next($request);
        }

        if(auth()->check() === true){
            if (auth()->user()->company_id === null) {
                return redirect()->route('dashboard.showUserCompanyDashboard');
            }
        }

        return $next($request);
    }
}
