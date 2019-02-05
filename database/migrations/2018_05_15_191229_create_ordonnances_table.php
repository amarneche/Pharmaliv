<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdonnancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordonnances', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medcin')->nullable();
            $table->unsignedInteger('patient');
            $table->string('photoURI',128);
           
            
            $table->foreign('patient')->references('idpatient')->on('patients');
            $table->foreign('medcin')->references('id')->on('medcins');
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
        Schema::dropIfExists('ordonnances');
    }
}
