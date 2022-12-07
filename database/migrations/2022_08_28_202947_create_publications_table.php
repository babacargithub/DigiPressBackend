<?php

use App\Models\Journal;
use App\Models\Journee;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parutions', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Journal::class);
            $table->foreignIdFor(Journee::class);
            $table->string("image_la_une");
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
        Schema::dropIfExists('publications');
    }
}
