<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visites', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->time('heure_debut');
            $table->time('heure_fin');
            $table->string('objet');
            $table->integer('stat');
            $table->unsignedInteger('visiteur_id');
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('departement_id')->nullable();
                        
                        
                        
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
        Schema::dropIfExists('visites');
    }
}
