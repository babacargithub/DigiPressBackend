<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeParutionColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table("journals", function (Blueprint $table){
            $table->integer("ordre_affichage")->nullable();
            $table->boolean("epingle")->nullable();
            $table->dateTime("epingle_jusqua")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("journals", function (Blueprint $table){
            $table->dropColumn("ordre_affichage");
            $table->dropColumn("epingle");
            $table->dropColumn("epingle_jusqua");
        });
    }
}
