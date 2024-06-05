<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface ICommonService
{
    public function getCountries():ServiceResponse;
    public function getCities():ServiceResponse;
    public function getTowns():ServiceResponse;
    public function getTaxOffices():ServiceResponse;
    public function getIntegrators():ServiceResponse;
}
