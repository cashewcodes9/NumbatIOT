<?php

namespace App\Http\Repositories;

use App\Http\Interface\DeviceRepositoryInterface;
use App\Models\Device;
use Illuminate\Pagination\LengthAwarePaginator;

class DeviceRepository implements DeviceRepositoryInterface
{

    /**
     * @inheritDoc
     */
    public function index(int $perPage = Device::PER_PAGE): LengthAwarePaginator
    {
       return Device::paginate($perPage);
    }

    /**
     * @inheritDoc
     */
    public function show(int $id) : Device
    {
        return Device::find($id);
    }

    /**
     * @inheritDoc
     */
    public function getUserDevices() : LengthAwarePaginator
    {
        return Device::relatedToUser(auth()->id())->paginate(Device::PER_PAGE);
    }
}
