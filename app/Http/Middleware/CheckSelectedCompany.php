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
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (auth()->check() && auth()->user()->company_id === null) {
            if ($request->routeIs(
                ['dashboard.showUserCompanyDashboard',
                    'dashboard.selectCompany',
                    'user.logout',
                    'dashboard.show',
                    'dashboard.showCreateCompany',
                    'dashboard.selectCompany',
                    'company.create',
                ]
            )) {
                return $next($request);
            } else {
                return redirect()->route('dashboard.showUserCompanyDashboard');
            }
        }

        return $next($request);
    }
}