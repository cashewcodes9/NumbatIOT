<?php

namespace App\Http\Repositories;

use App\Http\Interface\UserRepositoryInterface;
use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Class UserRepository
 * @package App\Http\Repositories
 */
class UserRepository implements UserRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function getCurrentUser(): Authenticatable
    {
        return auth()->user();
    }
}
