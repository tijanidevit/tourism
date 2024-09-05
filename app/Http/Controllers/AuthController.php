<?php

namespace App\Http\Controllers;

use App\Enums\UserRoleEnum;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) : RedirectResponse {
        if (!Auth::attempt($request->validated())) {
            return back()->withErrors(['password' => 'Invalid password'])->withInput(['email' => $request->email]);
        }

        if (auth()->user()->role == UserRoleEnum::ADMIN->value) {
            return to_route('home');
        }

        return to_route('app.home');
    }

    public function register(RegisterRequest $request) : RedirectResponse {
        $data = $request->validated();
        $user = User::create($data);
        Auth::login($user);

        return to_route('app.home');
    }

    public function logout() : RedirectResponse {
        Auth::logout();
        return redirect()->intended('/');
    }
}
