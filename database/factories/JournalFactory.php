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
            "prix" => $this->state(new Sequence(
                ['prix' => 100],
                ['prix' => 200],
            )),
//            "logo" => $this->faker->image('storage/app/public/logos')
            "logo" => "fake/images/im.png"
        ];
    }
}
