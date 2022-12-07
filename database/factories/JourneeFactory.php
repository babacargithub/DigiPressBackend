<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JourneeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date_parutions" => today(),
            "libelle" => "Journée du ".today()->format('d-m-Y'),
            //
        ];
    }
}
