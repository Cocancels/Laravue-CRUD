<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("description_client");
            $table->string("raison_sociale_client");
            $table->string("statut_juridique_client");
            $table->integer("capital_client");
            $table->bigInteger("siret_numero_client");
            $table->string("naf_code_client");
            $table->string("pays_siege_client");
            $table->text("adresse_siege_client");
            $table->integer("code_postal_siege_client");
            $table->string("ville_siege_client");
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
        Schema::dropIfExists('clients');
    }
}
