<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface ICommonService
{
    public function getCountries(string $query):ServiceResponse;
    public function getCities(string $query):ServiceResponse;
    public function getTowns(string $query):ServiceResponse;
    public function getTaxOffices(string $query):ServiceResponse;
    public function getIntegrators():ServiceResponse;
    public function getUnits():ServiceResponse;
    public function getTaxExemptions():ServiceResponse;
    public function getTaxes():ServiceResponse;
    public function getWitholdings():ServiceResponse;
}
