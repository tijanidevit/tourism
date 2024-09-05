<?php

namespace App\Http\Controllers\Api;

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Models\User;
use App\Traits\ResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ResponseTrait;

    public function login(LoginRequest $request) : JsonResponse {
        if (!Auth::attempt($request->validated())) {
            return $this->inputErrorResponse('Invalid password');
        }

        if (auth()->user()->role == UserRoleEnum::ADMIN->value) {
            return $this->unauthorizedResponse();
        }
        $user = auth()->user();
        $token = $user->createToken('auth')->plainTextToken;
        return $this->successResponse("Login successful", compact('user', 'token'));
    }


    public function register(RegisterRequest $request) : JsonResponse {
        $data = $request->validated();
        $user = User::create($data);
        Auth::login($user);
        $token = $user->createToken('auth')->plainTextToken;
        return $this->successResponse("Registration successful", compact('user', 'token'));
    }

    public function logout() : JsonResponse {
        Auth::logout();
        return $this->successResponse();
    }
}
