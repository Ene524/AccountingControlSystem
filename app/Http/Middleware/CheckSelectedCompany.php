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
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->company_id === null) {
            if ($request->routeIs(
                [
                    'dashboard.showUserCompanyDashboard',
                    'dashboard.selectCompany',
                    'company.create',
                    'company.edit',
                    'company.edit',
                    'company.store',
                    'company.delete',
                    'company.edit',
                    'user.logout',
                    'user.showLogin',
                    'verification.notice',
                    'verification.resend',
                    'common.getCountries',
                    'common.getCities',
                    'common.getTowns',
                    'common.getTaxOffices',
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
