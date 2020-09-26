<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaVacinas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vacinas',function(Blueprint $table){
            $table->increments('id');
            $table->string('tipo');
            $table->string('rotulo');
            $table->date('dataAplicacao');
            $table->date('dataProximaAplicacao')->nullable()->default("");
            $table->integer('pet_id');

            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('vacinas');

    }
}
