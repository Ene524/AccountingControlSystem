<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserController\DeleteRequest;
use App\Http\Requests\Api\UserController\FindByEmailRequest;
use App\Http\Requests\Api\UserController\ForgotPasswordRequest;
use App\Http\Requests\Api\UserController\GetByIdRequest;
use App\Http\Requests\Api\UserController\ResetPasswordRequest;
use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\IUserService;
use App\Http\Requests\Api\UserController\LoginRequest;
use App\Http\Requests\Api\UserController\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;


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

    public function findByEmail(FindByEmailRequest $request)
    {
        $response = $this->userService->findByEmail($request->email);
        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );

    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->userService->forgotPassword(
            email: $request->email,
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $response = $this->userService->resetPassword(
            email: $request->email,
            password: $request->password,
            token : $request->token,
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
        $user=User::find($request->id);
        $user->delete();
        dd("ok");
//        $response = $this->userService->delete($request->id);
//        return $this->HttpResponse(
//            $response->isSuccess(),
//            $response->getMessage(),
//            $response->getData(),
//            $response->getStatusCode()
//        );
    }

    public function getAll()
    {
        $response = $this->userService->getAll();
        return $this->HttpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function getById(GetByIdRequest $request)
    {
        $response = $this->userService->getById($request->id);
        return $this->HttpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
