<?php

namespace App\Http\Services;

use App\Http\Interface\DeviceRepositoryInterface;
use App\Http\Requests\IndexDeviceRequest;
use App\Models\Device;
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
    public function index(IndexDeviceRequest $request): LengthAwarePaginator
    {
        $validated = $request->validated();
        return $this->deviceRepository->index($validated['per_page']);
    }

    /**
     * Show a device
     *
     * @return mixed
     */
    public function show(int $id) : Device
    {
        return $this->deviceRepository->show($id);
    }

    /**
     * Get devices related to the user
     *
     * @return mixed
     */
    public function getUserDevices() : LengthAwarePaginator
    {
        return $this->deviceRepository->getUserDevices();
    }
}
