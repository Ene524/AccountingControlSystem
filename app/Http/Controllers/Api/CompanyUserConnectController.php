<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Eloquent\GetByIdRequest;
use App\Http\Requests\Api\UserCompanyConnect\CreateRequest;
use App\Http\Requests\Api\UserCompanyConnect\DeleteRequest;
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

    public function create(CreateRequest $request)
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

    public function delete(DeleteRequest $request)
    {
        $response = $this->userCompanyConnectService->delete(
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
}
