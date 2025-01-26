<?php

namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

/**
 * Class UserService
 * @package App\Http\Services
 */
class UserService
{
    /**
     * @var UserRepository
     */
    protected UserRepository $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get currently authenticated user
     *
     * @return mixed
     */
    public function getCurrentUser(): mixed
    {
        return $this->userRepository->getCurrentUser();
    }
}
