<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Eloquent\DeleteRequest;
use App\Http\Requests\Web\Eloquent\GetByIdRequest;
use App\Http\Requests\Web\UserController\FindByEmailRequest;
use App\Http\Requests\Web\UserController\ForgotPasswordRequest;
use App\Http\Requests\Web\UserController\LoginRequest;
use App\Http\Requests\Web\UserController\RegisterRequest;
use App\Http\Requests\Web\UserController\ResetPasswordRequest;
use App\Http\Requests\Web\UserController\UpdatePassword;
use App\Interfaces\Eloquent\IUserService;


class UserController extends Controller
{
    use HttpResponse;

    private IUserService $userService;

    public function __construct(IUserService $userService)
    {
        $this->userService = $userService;
    }

    public function showRegister()
    {
        return view('layouts.auth');
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
            token: $request->token,
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
        $response = $this->userService->delete($request->Id);
        return $this->HttpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
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
        $response = $this->userService->getById($request->Id);
        return $this->HttpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function updatePassword(UpdatePassword $request)
    {
        $response = $this->userService->updatePassword(
            email: $request->email,
            oldPassword: $request->oldPassword,
            password: $request->password,
        );
        return $this->HttpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}