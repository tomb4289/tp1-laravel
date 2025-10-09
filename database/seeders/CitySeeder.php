<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            'Montreal',
            'Toronto',
            'Vancouver',
            'Calgary',
            'Edmonton',
            'Ottawa',
            'Winnipeg',
            'Quebec City',
            'Hamilton',
            'Kitchener',
            'London',
            'Victoria',
            'Halifax',
            'Oshawa',
            'Windsor'
        ];

        foreach ($cities as $cityName) {
            City::create([
                'name' => $cityName
            ]);
        }
    }
}
