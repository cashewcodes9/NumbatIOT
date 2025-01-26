<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexDeviceRequest;
use App\Http\Services\DeviceService;
use App\Models\Device;
use Exception;
use Illuminate\Http\JsonResponse;

/**
 * Class DeviceController
 * @package App\Http\Controllers
 */
class DeviceController extends BaseController
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
    public function index(IndexDeviceRequest $request) : JsonResponse
    {
        try {
            return $this->deviceService->getDevices($request);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve devices', $e->getMessage(), 400);
        }
    }

    /**
     * Get devices related to the user
     *
     * @return mixed
     */
    public function getUserDevices(): JsonResponse
    {
        try {
            return Device::relatedToUser(1)->paginate(Device::PER_PAGE); //without auth testing only
            //return Device::relatedToUser(auth()->id())->paginate(Device::PER_PAGE);
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve devices', $e->getMessage(), 400);
        }
    }

}
