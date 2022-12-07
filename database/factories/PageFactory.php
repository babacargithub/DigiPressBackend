<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PageFactory extends Factory
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
            "nom" => $this->faker->text(6),
            "numero" => $this->faker->randomDigitNotZero(),
            "compteur" => 0
        ];
    }
}
