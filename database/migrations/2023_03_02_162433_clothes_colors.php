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
        Schema::create('clothes_colors', function (Blueprint $table){
            $table->unsignedBigInteger('idCol')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idClo')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['idCol', 'idClo']);
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
        Schema::dropIfExists('clothes_colors');
    }
};
