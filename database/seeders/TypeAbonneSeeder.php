<?php

namespace Database\Seeders;

use App\Models\CategorieAbonne;
use Illuminate\Database\Seeder;

class TypeAbonneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        CategorieAbonne::factory()->count(5)->create();
    }
}
