<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IUserService;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;


/**
 *
 */
class UserService implements IUserService
{

    /**
     * @param string $name
     * @param string $email
     * @param string $password
     * @return ServiceResponse
     */
    public function register(string $name, string $email, string $password): ServiceResponse
    {
        $user = $this->findByEmail($email);

        if ($user->isSuccess()) {
            return new ServiceResponse(false, "Bu kullanıcı sistemde mevcut", null, 400);
        }
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        return new ServiceResponse(true, "Kullanıcı başarıyla oluşturuldu", $user, 201);
    }

    /**
     * @param string $email
     * @return ServiceResponse
     */
    public function findByEmail(string $email): ServiceResponse
    {
        $user = User::where('email', $email)->first();

        if ($user) {
            return new ServiceResponse(true, "User found", $user, 200);
        }

        return new ServiceResponse(false, "User not found", null, 404);
    }


    /**
     * @param string $email
     * @param string $password
     * @param bool|null $remember
     * @return ServiceResponse
     */
    public function login(string $email, string $password, ?bool $remember): ServiceResponse
    {
        $user = $this->findByEmail($email);

        if ($user->isSuccess()) {
            $user = $user->getData();
            if (password_verify($password, $user->password)) {
//                $token = $user->createToken('auth_token')->plainTextToken;
//                return new ServiceResponse(true, "User logged in", ["token" => $token, "user" => $user], 200);
                Auth::login($user, $remember);
                return new ServiceResponse(true, "User logged in", ["user" => $user], 200);

            }
            return new ServiceResponse(false, "Kullanıcı bulunamadı ya da şifre yanlış", null, 400);
        }
        return $user;
    }

    /**
     * @param string $email
     * @return ServiceResponse
     */
    public function forgotPassword(string $email): ServiceResponse
    {
        $userResponse = $this->findByEmail($email);

        if ($userResponse->isSuccess()) {
            $status = Password::sendResetLink(Request::only('email'));
//            dd($status);
            if ($status == Password::RESET_LINK_SENT) {
                return new ServiceResponse(true, "Sıfırlama maili gönderildi", null, 200);
            } else {
                return new ServiceResponse(false, "Sıfırlama maili gönderilemedi", null, 400);
            }
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }
    }

    /**
     * @param string $email
     * @param string $password
     * @param string $token
     * @return ServiceResponse
     */
    public function resetPassword(string $email, string $password, string $token): ServiceResponse
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

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function delete(int $id): ServiceResponse
    {
        $user = $this->getById($id);
        if ($user->isSuccess()) {
            $user->getData()->delete();
            return new ServiceResponse(true, 'User deleted', null, 200);
        }
        return new ServiceResponse(false, 'User not found', null, 404);


    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $user = User::find($id);
        if ($user) {
            return new ServiceResponse(true, "User found", $user, 200);
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }
    }

    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $users = User::paginate(100);
        return new ServiceResponse(true, "Users found", $users, 200);
    }

    /**
     * @param string $email
     * @param string $oldPassword
     * @param string $password
     * @return ServiceResponse
     */
    public function updatePassword(string $email, string $oldPassword, string $password): ServiceResponse
    {
        $userResponse = $this->findByEmail($email);
        if ($userResponse->isSuccess()) {
            $user = $userResponse->getData();
            if (password_verify($oldPassword, $user->password)) {
                $user->password = $password;
                $user->save();
                return new ServiceResponse(true, "Password updated", null, 200);
            } else {
                return new ServiceResponse(false, "Wrong password", null, 400);
            }
        } else {
            return new ServiceResponse(false, "User not found", null, 404);
        }
    }

    /**
     * @param string $email
     * @param string $name
     * @return ServiceResponse
     */
    public function updateProfile(string $email, string $name): ServiceResponse
    {
        return new ServiceResponse(false, "Not implemented", null, 501);
    }

    public function logout(): ServiceResponse
    {
        Auth::logout();
        return new ServiceResponse(true, "User logged out", null, 200);
    }
}
