<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ComptePartner;

class AddFkConstraintRetraitComptePartners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('retrait_compte_partners', function (Blueprint $table) {
            $table->foreignIdFor(ComptePartner::class)->nullable(false)->change()->constrained()->cascadeOnDelete();

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
            $table->dropConstrainedForeignId(\App\Models\ComptePartner::class);

        });
    }
}
