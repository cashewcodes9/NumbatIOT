<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDeviceRequest;
use App\Http\Services\DeviceService;

/**
 * Class DeviceController
 * @package App\Http\Controllers
 */
class DeviceController
{
    /**
     * @var DeviceService
     */
    protected DeviceService $deviceService;

    /**
     * DeviceController constructor.
     * @param DeviceService $deviceService
     */
    public function __construct(DeviceService $deviceService)
    {
        $this->deviceService = $deviceService;
    }

    /**
     * Get devices
     *
     * @param IndexDeviceRequest $request
     * @return mixed
     */
    public function index(IndexDeviceRequest $request)
    {
        return $this->deviceService->getDevices($request->get('per_page'));
    }

}
