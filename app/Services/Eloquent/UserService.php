<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IUserService;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;



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
        $user = $this->findByEmail($email);


        $status = Password::reset(
            $email,
            function ($user) use ($email) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'remember_token' => Str::random(60),
                ])->save();

                $user->tokens()->delete();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            return response([
                'message' => 'Password reset successfully'
            ]);
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }


        return new ServiceResponse(true, "Email sent", null, 200);
    }
}
