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
            $table->unsignedBigInteger('idUse')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('idClo')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['idUse', 'idClo']);
            $table->boolean('like');
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
