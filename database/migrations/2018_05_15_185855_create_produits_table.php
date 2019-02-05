<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('pharmacie');
            $table->string('Titre',30);
            $table->string('photoURI',128);
            $table->text('notice')->nullable();
            $table->string('prix',10);
            $table->string('type',30);
            $table->text('description');
            
            $table->foreign('pharmacie')->references('id')->on('pharmacies');
            
           
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
}
