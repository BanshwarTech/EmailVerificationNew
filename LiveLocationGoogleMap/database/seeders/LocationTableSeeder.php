<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class LocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ne_NP');

        $locations = [];

        for ($i = 0; $i < 100; $i++) {
            $locations[] = [
                'district' => $faker->district,
                'city' => $faker->cityName,
                'lat' => $faker->unique()->latitude(27, 29),
                'lng' => $faker->unique()->longitude(81, 88),
            ];
        }

        Location::insert($locations); // Insert all data in one query
    }
}
