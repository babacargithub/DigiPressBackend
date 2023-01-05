<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ParutionFactory extends Factory
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
            "image_la_une"=>$this->faker->imageUrl(400,500)
        ];
    }
}
