<?php

namespace App\Http\Interface;

use App\Models\Device;
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
    public function index(int $perPage): LengthAwarePaginator;

    /**
     * Get device by id
     *
     * @param int $id
     * @return mixed
     */
    public function show(int $id): Device;

    /**
     * Get devices related to the user
     *
     * @return mixed
     */
    public function getUserDevices();
}
