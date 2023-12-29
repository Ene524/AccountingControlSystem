<?php

namespace App\Http\Controllers\Api;

use App\Core\HttpResponse;
use App\Core\ServiceResponse;
use App\Http\Requests\Api\UserController\LoginRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserController\RegisterRequest;
use App\Interfaces\Eloquent\IUserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


class UserController extends Controller
{
    use HttpResponse;

    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->userService->register(
            name: $request->name,
            email: $request->email,
            password: $request->password
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function login(LoginRequest $request)
    {
        $response = $this->userService->login(
            email: $request->email,
            password: $request->password
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function forgotPassword(Request $request)
    {
//        $response = $this->userService->forgotPassword(
//            email: $request->email
//        );
//
//        return $this->httpResponse(
//            $response->isSuccess(),
//            $response->getMessage(),
//            $response->getData(),
//            $response->getStatusCode()
//        );

        $response = Password::sendResetLink($request->only('email'));

        return $this->httpResponse(
            $response == Password::RESET_LINK_SENT,
            $response == Password::RESET_LINK_SENT ? 'Reset password link sent to your email' : 'Something went wrong',
            [],
            $response == Password::RESET_LINK_SENT ? 200 : 400
        );
    }
}
