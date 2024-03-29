<?php

use App\Models\Abonne;
use App\Models\CategorieAbonne;
use App\Models\Formule;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abonnements', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Abonne::class)->constrained("abonnes")->cascadeOnDelete()->cascadeOnUpdate();
            $table->dateTime("date_expiration");
            $table->foreignIdFor(Formule::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('abonnements');
    }
}
