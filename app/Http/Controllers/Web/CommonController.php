<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Town;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function getCountries()
    {
        $countries = Country::all();
        return json_encode($countries);
    }

    public function getCitiesByCountryId(Request $request)
    {
        $cities = City::where('country_id', $request->country_id)->get();
        return json_encode($cities);
    }

    public function getTownsByCityId($cityId)
    {
        $towns = Town::where('city_id', $cityId)->get();
        return json_encode($towns);
    }
}
