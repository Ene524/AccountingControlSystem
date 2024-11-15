<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICommonService;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\TaxCode;
use App\Models\TaxExemptionCode;
use App\Models\TaxOffice;
use App\Models\Town;
use App\Models\Unit;
use App\Models\WitholdingCode;

class CommonService implements ICommonService
{
    public function getCountries($query = null): ServiceResponse
    {
        $countries = Country::where('name', 'like', $query . '%')
            ->where('deleted_at', null)
            ->get();
        return new ServiceResponse(true, "Ülkeler başarıyla getirildi", $countries, 200);

    }

    public function getCities($query = null): ServiceResponse
    {
        $cities = City::where('name', 'like', $query . '%')
            ->where('deleted_at', null)
            ->get();
        return new ServiceResponse(true, "Şehirler başarıyla getirildi", $cities, 200);
    }

    public function getTowns($query = null): ServiceResponse
    {
        $towns = Town::where('name', 'like', $query . '%')
            ->where('deleted_at', null)
            ->get();
        return new ServiceResponse(true, "İlçeler başarıyla getirildi", $towns, 200);
    }

    public function getTaxOffices($query = null): ServiceResponse
    {
        $taxOffices = TaxOffice::where('name', 'like', $query . '%')
            ->where('deleted_at', null)
            ->get();
        return new ServiceResponse(true, "Vergi Daireleri başarıyla getirildi", $taxOffices, 200);
    }

    public function getIntegrators(): ServiceResponse
    {
        $integrators = Integrators::all();
        return new ServiceResponse(true, "Entegratörler başarıyla getirildi", $integrators, 200);
    }

    public function getUnits(): ServiceResponse
    {
        $units = Unit::all();
        return new ServiceResponse(true, "Birimler başarıyla getirildi", $units, 200);
    }

    public function getTaxExemptions(): ServiceResponse
    {
        $taxExemption=TaxExemptionCode::all();
        return new ServiceResponse(true,"Vergi muafiyet kodları getirildi",$taxExemption,200);
    }

    public function getTaxes(): ServiceResponse
    {
        $taxes=TaxCode::all();
        return new ServiceResponse(true,"Vergi kodları getirildi",$taxes,200);
    }

    public function getWitholdings():ServiceResponse
    {
        $witholdings=WitholdingCode::all();
        return new ServiceResponse(true,"Tevkifat kodları getirildi",$witholdings,200);
    }
}
