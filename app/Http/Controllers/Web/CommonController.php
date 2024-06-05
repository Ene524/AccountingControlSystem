<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\TaxOffice;
use App\Models\Town;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getCountries(Request $request)
    {
        $countries = Country::where('name', 'like', $request->get('query') . '%')
            ->where('deleted_at', null)
            ->get();

        return json_encode($countries);
    }

    public function getCities(Request $request)
    {
        $cities = City::where('name', 'like', $request->get('query') . '%')
            ->where('deleted_at', null)
            ->get();
        return json_encode($cities);
    }

    public function getTowns(Request $request)
    {
        $towns = Town::where('name', 'like', $request->get('query') . '%')
            ->where('deleted_at', null)
            ->get();
        return json_encode($towns);
    }

    public function getTaxOffices(Request $request)
    {
        $taxoffices = TaxOffice::where('name', 'like', $request->get('query') . '%')
            ->where('deleted_at', null)
            ->get();
        return json_encode($taxoffices);
    }
}
