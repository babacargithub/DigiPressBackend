<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JournalsMakeNombresPagesNullable extends Migration
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
           $table->integer("nombre_pages")->nullable()->change();
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
        Schema::table("journals", function (Blueprint $table){
            $table->integer("nombre_pages")->nullable(false)->change();
        });
    }
}
