<?php

namespace App\Http\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RefreshRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Http;

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

    public function login(LoginRequest $request)
    {
        //validate request
        $validated = $request->validated();

        throw_if(!auth()->attempt($validated), Exception::class, 'Invalid credentials');

        $user = auth()->user();

        // Call the /oauth/token endpoint to get the tokens

        $response = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
            'grant_type' => 'password',
            'client_id' => env('PASSWORD_CLIENT_ID'), // Define in .env
            'client_secret' => env('PASSWORD_CLIENT_SECRET'), // Define in .env
            'username' => $request->email,
            'password' => $request->password,
            'scope' => '*',
        ]);

        throw_if($response->failed(), Exception::class, 'Failed to generate access token');

        $data['user'] = $user;
        $data['token'] = $response->json();

        return $data;
    }

    // add method to get new access token + refresh token using the refresh token
    public function getRefreshToken(RefreshRequest $request)
    {
        $validated = $request->validated();

        // Call the /oauth/token endpoint with the refresh token
        $response = Http::asForm()->post('http://127.0.0.1:8000/oauth/token', [
            'grant_type' => 'refresh_token',
            'client_id' => env('PASSWORD_CLIENT_ID'),
            'client_secret' => env('PASSWORD_CLIENT_SECRET'),
            'refresh_token' => $validated['refresh_token'],
            'scope' => '*',
        ]);

        throw_if($response->failed(), Exception::class, 'Failed to generate access token');

        $data['token'] = $response->json();

        return $data;
    }

}
