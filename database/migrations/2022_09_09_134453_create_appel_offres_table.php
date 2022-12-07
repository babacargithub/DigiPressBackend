<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppelOffresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                /*
         * $titre
         * $sousTitre
         * $contenu
         * $publieDans
         * $dateLimite
         * $domaine
         * $cahier
         * $prixCahier
         * $autorité
         * $adresseAutorite
         * ==>timestamps
         * ==>softdeletes
         * */
        Schema::create('appel_offres', function (Blueprint $table) {
            $table->id();
            $table->string("titre")->nullable(false);
            $table->text("sous_titre");
            $table->longText("contenu");
            $table->string("publie_dans");
            $table->dateTime("date_limite");
            $table->string("domaine");
            //url du cahier des charges
            $table->string("cahier")->nullable();
            $table->integer("prix_cahier");
            $table->string("autorite");
            $table->string("adresse_autorite");
            $table->softDeletes();
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
        Schema::dropIfExists('appel_offres');
    }
}
