<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('idpatient');
            $table->string('assuranceURI',128);
            $table->unsignedInteger('pharmacie')->nullable();
            $table->string('traitement',128)->nullable();
            $table->string('alergie',128)->nullable();
            $table->boolean('enceinte')->nullable();
            $table->string('paymentParDefault',25)->nullable();
            $table->timestamps();
            
            $table->foreign('idpatient')->references('id')->on('users');
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
        Schema::dropIfExists('patients');
    }
}
