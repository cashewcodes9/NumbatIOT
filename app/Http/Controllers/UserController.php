<?php

namespace App\Http\Controllers;

use App\Http\Services\UserService;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    protected UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    /**
     * Display a currently authenticated user.
     */
    public function getCurrentUser(): JsonResponse
    {
        try {
            return $this->userService->getCurrentUser();
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve users', $e->getMessage(), 400);
        }
    }
}
