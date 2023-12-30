<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyUserConnectController extends Controller
{
    public function connectCompanyUser(Request $request)
    {
        $company = Company::find($request->company_id);
        $user = User::find($request->user_id);

        $company->users()->attach($user);

        return response()->json([
            'message' => 'User connected to company successfully.'
        ]);
    }
}
