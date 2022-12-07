<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ThemeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "nom" => $this->faker->text(15)
        ];
    }
}
