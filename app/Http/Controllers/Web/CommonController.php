<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\ICommonService;
use Illuminate\Http\Request;

class CommonController extends Controller
{
    private ICommonService $commonService;
    use HttpResponse;

    public function __construct(ICommonService $commonService)
    {
        $this->commonService = $commonService;
    }

    public function getCountries(Request $request)
    {
        $countries = $this->commonService->getCountries($request->get('query'));
        return json_encode($countries->getData());
    }

    public function getCities(Request $request)
    {
        $cities = $this->commonService->getCities($request->get('query'));
        return json_encode($cities->getData());
    }

    public function getTowns(Request $request)
    {
        $towns = $this->commonService->getTowns($request->get('query'));
        return json_encode($towns->getData());
    }

    public function getTaxOffices(Request $request)
    {
        $taxoffices = $this->commonService->getTaxOffices($request->get('query'));
        return json_encode($taxoffices->getData());
    }

    public function getCurrencies()
    {
        $response = $this->commonService->getCurrencies();
        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
