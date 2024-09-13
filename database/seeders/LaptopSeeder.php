<?php

namespace Database\Seeders;

use App\Models\laptop;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaptopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $laptops = [
            [
                'name' => "Rog",
                'price' => 12_000_000,
                'type' => "Zepyrous"
            ],
            [
                'name' => "Lenovo",
                'price' => 10_000_000,
                'type' => "LOQ"
            ],
            [
                'name' => "Razer",
                'price' => 15_000_000,
                'type' => "Blade 100"
            ],
            [
                'name' => "Macbook",
                'price' => 11_500_000,
                'type' => "Air M1"
            ],
            [
                'name' => "Huawei",
                'price' => 10_000_000,
                'type' => "X Hero"
            ],
        ];

        foreach($laptops as $laptop){
            Laptop::create($laptop);
        }
    }
}
