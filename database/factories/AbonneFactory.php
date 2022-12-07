<?php

namespace Database\Factories;

use App\Models\CategorieAbonne;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbonneFactory extends Factory
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
            "prenom" => $this->faker->firstName(),
            "nom" => $this->faker->lastName(),
            "telephone" => $this->faker->randomNumber(9),
//            "telephone" => $this->faker->phoneNumber(),
        ];
    }
}
