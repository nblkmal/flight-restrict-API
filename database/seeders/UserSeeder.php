<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Nabil',
                'email' => 'nblkmal@gmail.com',
                'password' => 'password'
            ],
            [
                'id' => 2,
                'name' => 'Aqil',
                'email' => 'aqilat94@gmail.com',
                'password' => 'password'
            ],
        ]);
    }
}
