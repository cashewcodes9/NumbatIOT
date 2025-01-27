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
            return $this->sendResponse($this->deviceService->index($request), 'Devices retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve devices', $e->getMessage(), 400);
        }
    }

    /**
     * Show a device
     *
     * @return mixed
     */
    public function show(int $id): JsonResponse
    {
        try {
            return $this->sendResponse($this->deviceService->show($id), 'Device retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve device', $e->getMessage(), 400);
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
            return $this->sendResponse($this->deviceService->getUserDevices(), 'Devices retrieved successfully');
        } catch (Exception $e) {
            return $this->sendError('Failed to retrieve devices', $e->getMessage(), 400);
        }
    }

}
