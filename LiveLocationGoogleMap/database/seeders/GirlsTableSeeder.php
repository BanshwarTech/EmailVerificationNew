<?php

namespace Database\Seeders;

use App\Models\Girl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GirlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('ne_NP');

        $girls = [];

        for ($i = 0; $i < 500; $i++) {
            $girls[] = [
                'name' => $faker->name,
                'lat' => $faker->latitude(27, 29),
                'lng' => $faker->longitude(81, 88),
            ];
        }

        Girl::insert($girls);
    }
}
