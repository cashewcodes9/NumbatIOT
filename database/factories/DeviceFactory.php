<?php

namespace Database\Factories;

use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Device>
 */
class DeviceFactory extends Factory
{

    protected $model = Device::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word, // Random word as the device name
            'device_unique_id' => Str::uuid()->toString(), // Unique identifier for the device
            'model' => $this->faker->word, // Random word for description
        ];
    }
}
