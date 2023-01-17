<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateColumnRetraitComptePartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('retrait_compte_partners', function (Blueprint $table) {
            //
            $table->dateTime("valide_le")->nullable(true)->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('retrait_compte_partners', function (Blueprint $table) {
            //
            $table->dateTime("valide_le")->nullable(false)->change();

        });
    }
}
