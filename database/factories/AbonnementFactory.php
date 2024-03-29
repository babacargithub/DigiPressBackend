<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AbonnementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "date_expiration" => now()->addDays(15)
            //
        ];
    }
}
