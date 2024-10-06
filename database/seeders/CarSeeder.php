<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    public function run()
    {
        $cars = [
            ['name' => 'Toyota Avanza', 'price_per_day' => 300000.00, 'stock' => 5],
            ['name' => 'Honda Jazz', 'price_per_day' => 350000.00, 'stock' => 4],
            ['name' => 'Suzuki Ertiga', 'price_per_day' => 320000.00, 'stock' => 5],
            ['name' => 'Mitsubishi Xpander', 'price_per_day' => 400000.00, 'stock' => 4],
            ['name' => 'Daihatsu Xenia', 'price_per_day' => 350000.00, 'stock' => 5],
            ['name' => 'Toyota Rush', 'price_per_day' => 450000.00, 'stock' => 5],
        ];

        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}