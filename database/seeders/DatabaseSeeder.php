<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();
        \App\Models\Category::factory(4)->create();
        \App\Models\Movie::factory(10)->create();
        \App\Models\Heroes::factory(10)->create();
        \App\Models\Power::factory(10)->create();
        \App\Models\Hero_Power::factory(10)->create();
        \App\Models\Hero_movie::factory(10)->create();


    }
}
