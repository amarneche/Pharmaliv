<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('pharmacie');
            $table->unsignedInteger('patient');
            $table->unsignedInteger('livreur')->nullable();
            $table->unsignedInteger('ordonnance')->nullable();
            $table->string('dateSouhaite')->nullable();
            $table->string('creneauDe')->nullable();
            $table->string('creneauA')->nullable();
            $table->string('statusDeCommande',30);
            $table->timestamp('dateFinLivraison')->nullable();            
            $table->timestamps();

            $table->foreign('pharmacie')->references('id')->on('pharmacies');
            $table->foreign('patient')->references('idpatient')->on('patients');
            $table->foreign('livreur')->references('id')->on('livreurs');
            $table->foreign('ordonnance')->references('id')->on('ordonnances');
            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commandes');
    }
}
