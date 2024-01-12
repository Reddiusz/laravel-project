<?php

namespace Database\Seeders;

use App\Models\People;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeopleGenerator extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        People::truncate();
        $faker = \Faker\Factory::create();
        for ($i = 0; $i < 200; $i++) {
            People::create([
                'firstname' => $faker->firstName(),
                'lastname' => $faker->lastName(),
                'phone_num' => $faker->phoneNumber(),
                'street' => $faker->streetName(),
                'city' => $faker->city()
            ]);
        }
    }
}