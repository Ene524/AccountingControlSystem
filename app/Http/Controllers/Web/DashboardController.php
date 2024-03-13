<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $company = auth()->user()->company;

        if ($company) {

            return view('modules.dashboard.index.index', compact('company'));
        }
        return view('modules.dashboard.index.index');
    }
}
