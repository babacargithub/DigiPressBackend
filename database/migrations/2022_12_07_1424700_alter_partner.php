<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Journal;
use App\Models\User;

class AlterPartner extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('partners',function (Blueprint $table){
            $table->foreignIdFor(User::class)->nullable()->change();
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
        Schema::table('partners',function (Blueprint $table){
            $table->foreignIdFor(User::class)->nullable(false)->change()->constrained();
        });
    }
}
