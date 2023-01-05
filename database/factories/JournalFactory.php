<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;

class JournalFactory extends Factory
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
            "prix" => 200,
//            "prix" => $this->state(new Sequence(
//                ['prix' => 100],
//                ['prix' => 200],
//            )),
            "nombre_pages"=>"8",
            "logo" => $this->faker->imageUrl('storage/framework/testing/disks',240),

        ];
    }
}
