<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ComptePartner;

class CreateRetraitComptePartnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retrait_compte_partners', function (Blueprint $table) {
            $table->id();
            $table->integer("montant")->nullable(false);
            $table->foreignIdFor(ComptePartner::class)->nullable(false);
            $table->dateTime("valide_le");
            $table->boolean("valide")->default(false);
            $table->text("commentaire")->nullable();

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
        Schema::dropIfExists('retrait_compte_partners');
    }
}
