<?php

namespace Database\Seeders;

use App\Models\Formule;
use Illuminate\Database\Seeder;

class TypeAbonnementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Formule::factory()->count(5)->create();

    }
}
