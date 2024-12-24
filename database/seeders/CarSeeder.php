<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

      

        //looping

        for ($i=0; $i <5; $i++) {

            $car =  Car::create([
                "name" => fake()->sentence(3),
                "brand" => fake()->sentence(2),
                "model" => fake()->sentence(2),
                "year" => fake()->numberBetween($min = 2020, $max = 2025),
                "car_type" => fake()->word(20),
                "daily_rent_price" => fake()->randomDigit(),
                "availability" => fake()->boolean(),
                "image" => fake()->imageUrl()
            ]);
        }
    }    
           
}
