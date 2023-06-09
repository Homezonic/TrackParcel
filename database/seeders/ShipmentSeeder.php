<?php

namespace Database\Seeders;

use App\Models\Shipment;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class ShipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        Shipment::factory(10)->create([]);
    }
}
