<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achats', function (Blueprint $table) {
            
            $table->unsignedInteger('commande');
            $table->unsignedInteger('produit');
            $table->integer('qte');

            $table->foreign('commande')->references("id")->on('commandes');
            $table->foreign('produit')->references("id")->on('produits');
            $table->primary(['commande','produit']);

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
        Schema::dropIfExists('achats');
    }
}
