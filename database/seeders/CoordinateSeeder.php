<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoordinateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coordinates')->insert([
            [
                'id' => 1,
                'latitude' => '3.132071233314122',
                'longitude' => '101.69475534629903',
                'place_id' => 1
            ],
            [
                'id' => 2,
                'latitude' => '2.945374429829839',
                'longitude' => '101.70083299790008',
                'place_id' => 2
            ],
            [
                'id' => 3,
                'latitude' => '3.0361421249024567',
                'longitude' => '101.44828958677152',
                'place_id' => 3
            ]
        ]);
    }
}
