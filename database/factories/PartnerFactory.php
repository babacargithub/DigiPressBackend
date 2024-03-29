<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PartnerFactory extends Factory
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
            "nom" => $this->faker->company(),
            "telephone" => $this->faker->randomNumber(9),
            "email" => $this->faker->companyEmail()

        ];
    }
}
