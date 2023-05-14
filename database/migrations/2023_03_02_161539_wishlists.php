<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wishlists', function (Blueprint $table){
            $table->increments('idWis');
            $table->integer('idUse')->unsigned();
            $table->integer('idClo')->unsigned();

            $table->foreign('idUse')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idClo')->references('id')->on('clothes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wishlists');
    }
};
