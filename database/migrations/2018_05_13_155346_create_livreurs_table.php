<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLivreursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livreurs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('positionGPS',20)->nullable();
            $table->boolean('disponible')->default(true);
            $table->string('moyenneDeTransport',20)->nullable();

            $table->foreign('id')->references('id')->on('users');

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
        Schema::dropIfExists('livreurs');
    }
}
