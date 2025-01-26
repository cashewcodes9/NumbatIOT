<?php

namespace App\Http\Services;

use App\Http\Interface\DeviceRepositoryInterface;
use App\Http\Requests\IndexDeviceRequest;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class DeviceService
 * @package App\Http\Services
 */
class DeviceService
{
    /**
     * @var DeviceRepositoryInterface
     */
    protected $deviceRepository;

    /**
     * DeviceService constructor.
     * @param DeviceRepositoryInterface $deviceRepository
     */
    public function __construct(DeviceRepositoryInterface $deviceRepository)
    {
        $this->deviceRepository = $deviceRepository;
    }

    /**
     * Get devices
     *
     * @return mixed
     */
    public function getDevices(IndexDeviceRequest $request): LengthAwarePaginator
    {
        $validated = $request->validated();
        return $this->deviceRepository->getDevices($validated['per_page']);
    }
}
