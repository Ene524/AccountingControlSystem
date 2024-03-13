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
        if (auth()->check()) {
            return redirect()->route("dashboard.index");
        } else {
            return view('modules.authentication.register.index');
        }
    }

    public function register(RegisterRequest $request)
    {
        $response = $this->userService->register(
            name: $request->name,
            email: $request->email,
            password: $request->password,
        );

        if ($response->isSuccess()) {
            return redirect()->back()->with('success', $response->getMessage());
        } else {
            return redirect()->back()->withErrors(["email" => $response->getMessage()])->onlyInput("email", "remember");

        }
    }

    public function showLogin()
    {
        if (auth()->check()) {
            return redirect()->route("dashboard.index");
        } else {
            return view('modules.authentication.login.index');
        }
    }


    public function login(LoginRequest $request)
    {
        $response = $this->userService->login(
            email: $request->email,
            password: $request->password,
            remember: $request->remember,
        );

        if ($response->isSuccess()) {
            return redirect()->route("dashboard.index");
        } else {
            return redirect()->route("user.login")->withErrors(["email" => $response->getMessage()])->onlyInput("email", "remember");

        }
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

    public function showForgotPassword()
    {
        return view('emails.forgot-password');
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $response = $this->userService->forgotPassword(
            email: $request->email,
        );

        if ($response->isSuccess()) {
            return redirect()->route("password.showForgotPassword")->with('success', $response->getMessage());
        } else {
            return redirect()->route("password.forgotPassword")->withErrors(["email" => $response->getMessage()])->onlyInput("email");
        }

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

    public function logout()
    {
        $response = $this->userService->logout();

        if ($response->isSuccess()) {
            return redirect()->route('user.showLogin');
        } else {
            return redirect()->back()->with('message', $response->getMessage());
        }
    }
}
