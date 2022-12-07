<?php

use App\Models\Abonne;
use App\Models\Parution;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AchatParution extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        /* @properties
         * client_id
         * parution_id
         * prix
         * commission_journal
         * date_achat
         * method_paiement
         */
        Schema::create('achats_parution', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Abonne::class)->constrained();
            $table->foreignIdFor(Parution::class)->constrained();
            $table->integer("prix");
            $table->integer("commission_journal");
            $table->string("methode_paiement");
            //url du cahier des charges
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
        //
        Schema::dropIfExists('achats_parution');
    }
}
