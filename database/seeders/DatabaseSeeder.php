<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ModelHasRoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([UserSeeder::class]);
        $this->call([RoleSeeder::class]);
        $this->call([ModelHasRoleSeeder::class]);
        $this->call([TypeSeeder::class]);
        $this->call([PlaceSeeder::class]);
        $this->call([CoordinateSeeder::class]);
    }
}
