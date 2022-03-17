<?php

namespace Database\Factories;

use App\Models\Heroes;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class Hero_MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'hero_id' =>Heroes::all()->random()->id,
            'movie_id' =>Movie::all()->random()->id,
        ];
    }
}
