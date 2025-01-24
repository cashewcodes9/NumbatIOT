<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RefreshRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AuthService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Class AuthController
 * @package App\Http\Controllers
 */
class AuthController extends BaseController
{
    /**
     * @var AuthService
     */
    protected AuthService $authService;

    /**
     * AuthController constructor.
     * @param AuthService $authService
     */
    public function __construct(AuthService $authService)
    {
       $this->authService = $authService;
    }

    /**
     * Method to register a new user
     * @param RegisterRequest $request
     * @return JsonResponse
     */
    public function register(RegisterRequest $request): JsonResponse
    {
        try {
            $data = $this->authService->register($request);
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'User registration failed',
                'error' => $e->getMessage()
            ];
            //return response()->json($response, 400);
            return $this->sendError('User registration failed', $e->getMessage(), 400);
        }

        return $this->sendResponse($data, 'User registered successfully');
    }

    /**
     * Method to login a user
     * @param LoginRequest $request
     * @return JsonResponse
     */
    public function login(LoginRequest $request): JsonResponse
    {
        try {
            $data = $this->authService->login($request);
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'User login failed',
                'error' => $e->getMessage()
            ];
            return response()->json($response, 400);
        }

        $response = [
            'status' => 'success',
            'message' => 'User logged in successfully',
            'data' => $data
        ];
        return response()->json($response, 200);
    }

    // return new access token using the refresh token
    public function refresh(RefreshRequest $request): JsonResponse
    {
        try {
            $data = $this->authService->getRefreshToken($request);
        } catch (Exception $e) {
            $response = [
                'status' => 'error',
                'message' => 'Token refresh failed',
                'error' => $e->getMessage()
            ];
            return response()->json($response, 400);
        }

        $response = [
            'status' => 'success',
            'message' => 'Token refreshed successfully',
            'data' => $data
        ];
        return response()->json($response, 200);
    }
}



