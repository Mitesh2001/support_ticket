<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CreateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities =
        [
			'Ahmednagar',
			'Akola',
			'Amravati',
			'Aurangabad',
			'Bhandara',
			'Beed',
			'Buldhana',
			'Chandrapur',
			'Dhule',
			'Gadchiroli',
			'Gondia',
			'Hingoli',
			'Jalgaon',
			'Jalna',
			'Kolhapur',
			'Latur',
			'Mumbai City',
			'Mumbai suburban',
			'Nandurbar',
			'Nanded',
			'Nagpur',
			'Nashik',
			'Osmanabad',
			'Parbhani',
			'Pune',
			'Raigad',
			'Ratnagiri',
			'Sindhudurg',
			'Sangli',
			'Solapur',
			'Satara',
			'Thane',
			'Wardha',
			'Washim',
			'Yavatmal',
		];

        foreach ($cities as $city) {
            City::firstOrCreate([
                'name' => $city,
                'state_id' => 15
            ]);
        }
    }
}
