<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(UserRequest $userRequest)
    {
        $attribute = $userRequest->validated();
        $user = User::create($attribute);
        auth()->login($user);

    }

    public function login(LoginRequest $loginRequest)
    {
        $attribute = $loginRequest->validated();
        if (Auth::attempt($attribute)) {
            return redirect()->intended(RouteServiceProvider::HOME);
        }

    }
}
