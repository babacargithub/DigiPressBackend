<?php

namespace Database\Seeders;

use App\Models\TypeAbonnement;
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
        TypeAbonnement::factory()->count(5)->create();

    }
}
