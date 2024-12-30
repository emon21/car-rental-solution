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

        $brands = ['BMW', 'Honda', 'Ford', 'Hyundai', 'Tesla', 'Toyota'];

        $models = array('bmw-luxury-vehicles', 'honda-mass-market-cars', 'ford-mass-market-cars', 'hyundai-mass-market-cars', 'tesla-luxury-electric-vehicles', 'toyota-mass-market-cars');

        $bmw = "https://www.carlogos.org/car-logos/bmw-logo.png";
        $honda = "https://www.carlogos.org/car-logos/honda-logo-2000-full-download.png";
        $ford = "https://www.carlogos.org/car-logos/ford-logo.png";
        $hyundai = "https://www.carlogos.org/car-logos/hyundai-logo-2011-download.png";
        $tesla = "https://www.carlogos.org/car-logos/tesla-logo.png";
        $toyota = "https://www.carlogos.org/car-logos/toyota-logo-2020-europe-download.png";

        $images = array($bmw, $honda, $ford, $hyundai, $tesla, $toyota);

        $carType = ['BMW-CAR', 'Honda-SEDAN', 'Ford-SPORT-UTILITY', 'Hyundai-Evolution', 'Tesla-SPORTS-CAR', 'Toyota-COUPE'];

        // looping
        for ($i = 0; $i < 6; $i++) {

            Car::create([
                "name" => fake()->sentence(5),
                "brand" => $brands[$i],
                "model" => $models[$i],
                // "model" => fake()->sentence(2),
                "year" => fake()->numberBetween($min = 2020, $max = 2025),
                "car_type" => $carType[$i],
                // "car_type" => fake()->word(20),
                "daily_rent_price" => fake()->randomDigit(),
                "availability" => fake()->boolean(),
                // "image" => fake()->imageUrl()
                "image" => $images[$i]
            ]);
        }
    }
}
