<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDeviceSeeder extends Seeder
{
    public function run()
    {
        // Fetch all users
        $users = User::all();

        // Ensure there are users before proceeding
        if ($users->isEmpty()) {
            $this->command->warn('No users found. Please seed users first!');
            return;
        }

        // Create devices and associate them with users
        $users->each(function ($user) {
            // Create 5 devices for each user
            $devices = Device::factory(5)->create();

            // Attach devices to the user in the pivot table
            foreach ($devices as $device) {
                $user->devices()->attach($device->id, [
                    'permission' => 'read_write', // Example permission
                ]);
            }
        });

        $this->command->info('Devices and user-device relationships seeded successfully!');
    }
}
