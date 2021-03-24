<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients');
            $table->string("nom_responsable_projet");
            $table->string("prenom_responsable_projet");
            $table->integer("telephone_responsable_projet");
            $table->string("mail_responsable_projet");
            $table->string("titre_projet");
            $table->text("description_projet");
            $table->date("debut_projet");
            $table->date("fin_projet");
            $table->string("status_projet");
            $table->integer("jours_vendus_projet");
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
        Schema::dropIfExists('projets');
    }
}
