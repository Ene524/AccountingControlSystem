<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICommonService;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\TaxOffice;
use App\Models\Town;

class CommonService implements ICommonService
{

    public function getCountries(): ServiceResponse
    {
        $countries = Country::all();
        return new ServiceResponse(true,"Ülkeler başarıyla getirildi",$countries,200);

    }

    public function getCities(): ServiceResponse
    {
        $cities = City::all();
        return new ServiceResponse(true,"Şehirler başarıyla getirildi",$cities,200);
    }

    public function getTowns(): ServiceResponse
    {
        $towns= Town::all();
        return new ServiceResponse(true,"İlçeler başarıyla getirildi",$towns,200);
    }

    public function getTaxOffices(): ServiceResponse
    {
        $taxOffices = TaxOffice::all();
        return new ServiceResponse(true,"Vergi Daireleri başarıyla getirildi",$taxOffices,200);
    }

    public function getIntegrators(): ServiceResponse
    {
        $integrators = Integrators::all();
        return new ServiceResponse(true,"Entegratörler başarıyla getirildi",$integrators,200);
    }
}
