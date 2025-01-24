<?php

namespace App\Http\Interface;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Interface DeviceRepositoryInterface
 * @package App\Http\Interface
 */
interface DeviceRepositoryInterface
{
    /**
     * Get devices
     *
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getDevices(int $perPage): LengthAwarePaginator;
}
