<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\UserController\UserRequest;

class UserController extends Controller
{
    public function register(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // TODO: Hash password
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        $response =  [
            'user' => $user,
            'token' => $token,
        ];

        return response()->json($response, 200);
    }
}
