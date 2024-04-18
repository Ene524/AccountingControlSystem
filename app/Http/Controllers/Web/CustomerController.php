<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\ICustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    private ICustomerService $customerService;

    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index(){
        return view ('modules.customer.index.index');
    }

    public function getAll()
    {
        $response = $this->customerService->getAll();

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
