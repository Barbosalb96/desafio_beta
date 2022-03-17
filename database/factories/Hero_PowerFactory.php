<?php

namespace Database\Factories;

use App\Models\Heroes;
use App\Models\Power;
use Illuminate\Database\Eloquent\Factories\Factory;

class Hero_PowerFactory extends Factory
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
            'power_id' =>Power::all()->random()->id,
        ];
    }
}
