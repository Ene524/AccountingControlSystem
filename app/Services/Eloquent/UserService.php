<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IUserService;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserService implements IUserService
{
    public function register(string $name, string $email, string $password): ServiceResponse
    {
        $user = $this->findByEmail($email);

        if ($user->isSuccess()) {
            return new ServiceResponse(false, "User already exists", null, 400);
        }
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        return new ServiceResponse(true, "User created", $user, 201);
    }

    public function login(string $email, string $password): ServiceResponse
    {
        $user = $this->findByEmail($email);

        if ($user->isSuccess()) {
            $user = $user->getData();
            if (password_verify($password, $user->password)) {
                $token = $user->createToken('auth_token')->plainTextToken;
                return new ServiceResponse(true, "User logged in", ["token" => $token, "user" => $user], 200);

            }
            return new ServiceResponse(false, "Wrong password", null, 400);
        }
        return $user;
    }

    public function findByEmail(string $email): ServiceResponse
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            return new ServiceResponse(true, "User found", $user, 200);
        }

        return new ServiceResponse(false, "User not found", null, 404);
    }

    public function forgotPassword(string $email): ServiceResponse
    {
        $userResponse = $this->findByEmail($email);

        if ($userResponse->isSuccess()) {
            $status = Password::sendResetLink(Request::only('email'));

            if ($status == Password::RESET_LINK_SENT) {
                return new ServiceResponse(true, "Reset password link sent", null, 200);
            } else {
                return new ServiceResponse(false, "Reset password link not sent", null, 400);
            }
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }
    }

    public function resetPassword(string $email, string $password, string $token,): ServiceResponse
    {
        $userResponse = $this->findByEmail($email);
        if ($userResponse->isSuccess()) {
            $status = Password::reset(
                [
                    'email' => $email,
                    'password' => $password,
                    'password_confirmation' => $password,
                    'token' => $token
                ],
                function ($user) use ($email, $password) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    $user->tokens()->delete();
                    event(new PasswordReset($user));
                }
            );


            if ($status == Password::PASSWORD_RESET) {
                return new ServiceResponse(true, "Password reset", null, 200);

            } else {
                return new ServiceResponse(false, "Password not reset - " . $status, null, 400);
            }
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }


    }
}
