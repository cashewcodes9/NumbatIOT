<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        //$device = Device::create(['name' => 'Device 1', 'device_unique_id' => rand(5, 10000), 'Model' => 'Sensor 453']);
        //$device->users()->attach(User::first(), ['permission' => 'read']);

        $this->call([
            UserDeviceSeeder::class
        ]);

    }
}
