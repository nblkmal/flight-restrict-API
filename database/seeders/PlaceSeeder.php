<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('places')->insert([
            [
                'id' => 1,
                'name' => 'Istana Negara',
                'state' => 'Kuala Lumpur',
                'description' => 'Istana di Kuala Lumpur',
                'type_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Istana Melawati',
                'state' => 'Kuala Lumpur',
                'description' => 'Istana di Putrajaya',
                'type_id' => 1
            ],
            [
                'id' => 3,
                'name' => 'Istana Alam Shah',
                'state' => 'Selangor',
                'description' => 'Istana di Selangor',
                'type_id' => 1
            ]
        ]);
    }
}
