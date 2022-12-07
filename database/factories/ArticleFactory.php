<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
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
            "compteur" => 0,
            "contenu" => $this->faker->paragraphs(100,true),
            "image" => $this->faker->image(),
            "sous_titre" => $this->faker->sentence(20, true),
            "titre" => $this->faker->sentence(10, true)
        ];
    }
}
