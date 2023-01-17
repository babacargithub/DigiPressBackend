<?php

use App\Models\CompteAbonne;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRechargeComptesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recharge_comptes', function (Blueprint $table) {
            $table->id();
            $table->integer('montant')->nullable(false);
            $table->foreignIdFor(CompteAbonne::class)->nullable(false)->constrained()->cascadeOnDelete();
            $table->string("methode_paiement")->nullable();
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
        Schema::dropIfExists('recharge_comptes');
    }
}
