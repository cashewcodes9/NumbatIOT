<?php

namespace App\Http\Services;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
/**
 * Class AuthService
 * @package App\Http\Services
 */
class AuthService
{
    public function register(RegisterRequest $request): array
    {
        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        $data['user'] = $user;
        return $data;
    }

    public function login(Request $request)
    {
        //validate request
        $validated = $request->validated();

        if (!auth()->attempt($validated)) {
            throw new Exception('Invalid credentials');
        }

        $user = auth()->user();

        //return access token here

        $data['user'] = $user;
        $data['access_token'] = $user->createToken('authToken')->accessToken;
        //send refresh token here

        return $data;
    }

    // add method to send new access token + refresh token using the refresh token
}
