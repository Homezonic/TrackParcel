<?php

namespace Database\Factories;

use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shipment>
 */
class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tracking_id'                 => $this->faker->unique()->randomNumber(9),
            'shipper_name'                => $this->faker->name,
            'shipper_phone_number'        => $this->faker->PhoneNumber,
            'shipper_address'             => $this->faker->address,
            'shipper_country'             => $this->faker->country,
            'shipper_state'               => $this->faker->state,
            'shipper_city'                => $this->faker->city,
            'shipper_zipcode'             => $this->faker->randomNumber(5),
            'receiver_name'               => $this->faker->name,
            'receiver_phone_number'       => $this->faker->PhoneNumber,
            'receiver_address'            => $this->faker->address,
            'receiver_country'            => $this->faker->country,
            'receiver_state'              => $this->faker->state,
            'receiver_city'               => $this->faker->city,
            'receiver_zipcode'            => $this->faker->randomNumber(5),
            'package_name'                => $this->faker->word(2),
            'package_type'                => 'Box',
            'package_weight'              => '3.2',
        ];
    }
}
