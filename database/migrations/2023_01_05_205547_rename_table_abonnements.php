<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameTableAbonnements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('type_abonnements', function (Blueprint $table) {
            $table->renameColumn("niveau","duree");
            $table->rename("formules");
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
        Schema::table('formules', function (Blueprint $table) {
            $table->renameColumn("duree","niveau");
            $table->rename("type_abonnements");

        });
    }
}
