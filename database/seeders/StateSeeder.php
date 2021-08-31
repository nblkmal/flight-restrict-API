<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('states')->insert([
            [
                'id' => 1,
                'name' => 'JOHOR',
            ],
            [
                'id' => 2,
                'name' => 'KEDAH',
            ],
            [
                'id' => 3,
                'name' => 'KELANTAN',
            ],
            [
                'id' => 4,
                'name' => 'MELAKA',
            ],
            [
                'id' => 5,
                'name' => 'NEGERI SEMBILAN',
            ],
            [
                'id' => 6,
                'name' => 'PAHANG',
            ],
            [
                'id' => 7,
                'name' => 'PULAU PINANG',
            ],
            [
                'id' => 8,
                'name' => 'PERAK',
            ],
            [
                'id' => 9,
                'name' => 'PERLIS',
            ],
            [
                'id' => 10,
                'name' => 'SELANGOR',
            ],
            [
                'id' => 11,
                'name' => 'TERENGGANU',
            ],
            [
                'id' => 12,
                'name' => 'SABAH',
            ],
            [
                'id' => 13,
                'name' => 'SARAWAK',
            ],
            [
                'id' => 14,
                'name' => 'W.P KUALA LUMPUR',
            ],
            [
                'id' => 15,
                'name' => 'W.P LABUAN',
            ],
            [
                'id' => 16,
                'name' => 'W.P PUTRAJAYA',
            ],
            [
                'id' => 17,
                'name' => 'Northen',
            ],
            [
                'id' => 18,
                'name' => 'Central',
            ],
            [
                'id' => 19,
                'name' => 'Sabah & Sarawak',
            ],
            [
                'id' => 20,
                'name' => 'East Coast',
            ],
            [
                'id' => 21,
                'name' => 'Southern',
            ]
            ]);
    }
}
