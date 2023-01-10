<?php

namespace Database\Seeders;

use App\Models\Abonne;
use App\Models\Abonnement;
use App\Models\CategorieAbonne;
use App\Models\Formule;
use Illuminate\Database\Seeder;

class AbonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Abonne::factory()->count(500)
            ->for(CategorieAbonne::factory()->create())
            ->has(Abonnement::factory()->for(Formule::factory()))
            ->create();
    }
}
