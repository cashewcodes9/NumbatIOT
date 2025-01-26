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
    public function getDevices(int $perPage = Device::PER_PAGE): LengthAwarePaginator
    {
       return Device::paginate($perPage);
    }
}
