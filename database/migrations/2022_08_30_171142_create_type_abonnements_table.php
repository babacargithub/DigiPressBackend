<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeAbonnementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_abonnements', function (Blueprint $table) {
            $table->id();
            $table->integer("prix")->nullable(false);
            $table->string("nom")->nullable("false")->unique();
            $table->integer("niveau")->nullable("false")->unique();
            $table->unique(["prix","nom","niveau"]);
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
        Schema::dropIfExists('type_abonnements');
    }
}
