<?php

use App\Models\Theme;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableArticles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
//        Schema::table("articles", function(Blueprint $table){
//            $table->foreignIdFor(Theme::class)->nullable()->constrained()->nullOnDelete();
//
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
//        Schema::table("articles", function(Blueprint $table){
//            $table->dropColumn("theme_id");
//
//        });
    }
}
