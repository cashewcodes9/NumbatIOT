<?php

namespace App\Http\Interface;

use Illuminate\Contracts\Auth\Authenticatable;

/**
 * Interface UserRepositoryInterface
 * @package App\Http\Interface
 */
interface UserRepositoryInterface
{
    /**
     * Get currently authenticated user
     *
     * @return mixed
     */
   public function getCurrentUser(): Authenticatable;
}
