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
                'description' => 'Istana di Kuala Lumpur',
                'type_id' => 1
            ],
            [
                'id' => 2,
                'name' => 'Istana Melawati',
                'description' => 'Istana 2 di Putrajaya',
                'type_id' => 1
            ]
        ]);
    }
}
