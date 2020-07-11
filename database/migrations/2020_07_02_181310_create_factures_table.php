<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('libelle');
            //$table->string('dateFacture');
            $table->string('datePaiement');
            $table->string('montant');
            $table->string('etat');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('fournisseur_id');
            $table->foreign('fournisseur_id')->references('id')->on('fournisseurs');
            $table->unsignedBigInteger('typepaiement_id');
            $table->foreign('typepaiement_id')->references('id')->on('typepaiements');
            $table->unsignedBigInteger('annee_id');
            $table->foreign('annee_id')->references('id')->on('annees');
            $table->unsignedBigInteger('mois_id');
            $table->foreign('mois_id')->references('id')->on('mois');
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
        Schema::dropIfExists('factures');
    }
}
