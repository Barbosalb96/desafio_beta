<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->userName(),
            'description' => $this->faker->text(),
        ];
    }
}
