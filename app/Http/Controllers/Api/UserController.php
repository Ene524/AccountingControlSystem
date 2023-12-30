<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Core\HttpResponse;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Interfaces\Eloquent\IUserService;
use App\Http\Requests\Api\UserController\LoginRequest;
use App\Http\Requests\Api\UserController\RegisterRequest;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Str;
use Mail;

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
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
        ]);

        if (!$validator->fails()) {
            $status=Password::sendResetLink($request->only('email'));


            if ($status == Password::RESET_LINK_SENT) {
                return response()->json(['message' => __($status)], 200);
            } else {
                return response()->json(['message' => __($status)], 401);
            }
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 401);
        }
    }

    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required|confirmed|min:8',
        ]);

        if (!$validator->fails()) {
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user) use ($request) {
                    $user->forceFill([
                        'password' => Hash::make($request->password),
                        'remember_token' => Str::random(60),
                    ])->save();

                    $user->tokens()->delete();
                    event(new PasswordReset($user));
                }
            );

            if ($status == Password::PASSWORD_RESET) {
                return response()->json(['success' => __('passwords.reset')], 200);
            } else {
                return response()->json(['errors' => __("Bir sorun oluştu")], 401);
            }
        } else {
            return response()->json(['errors' => $validator->errors()->all()], 401);
        }



    }
}
