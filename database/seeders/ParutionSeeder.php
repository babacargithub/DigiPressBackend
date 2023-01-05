<?php

namespace Database\Seeders;

use App\Models\Journal;
use App\Models\Journee;
use App\Models\Parution;
use Illuminate\Database\Seeder;

class ParutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $journee = Journee::factory()->create();
        $journaux = Journal::factory()->count(10)->create();
        foreach ($journaux as $journal) {
            Parution::factory()
                ->for($journee)
                ->for($journal )
                ->create();
        }

    }
}
