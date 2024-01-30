<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\IUserCompanyConnectService;
use Illuminate\Http\Request;

class CompanyUserConnectController extends Controller
{
    use HttpResponse;

    private IUserCompanyConnectService $userCompanyConnectService;

    public function __construct(IUserCompanyConnectService $userCompanyConnectService)
    {
        $this->userCompanyConnectService = $userCompanyConnectService;
    }
    public function create(Request $request)
    {
        $response = $this->userCompanyConnectService->create(
            user_id: $request->user_id,
            company_id: $request->company_id
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
    public function getAll(){
        $response = $this->userCompanyConnectService->getAll();
        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
