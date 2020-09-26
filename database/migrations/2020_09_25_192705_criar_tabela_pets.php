<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriarTabelaPets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('pets',function (Blueprint $table){
            $table->increments('id');
            $table->string('nome');
            $table->string('tipo')->nullable()->default("");
            $table->string('raca')->nullable()->default("");
            $table->string('cor')->nullable()->default("");
            $table->string('sexo')->nullable()->default("");
            $table->date('dataNascimento')->nullable()->default("");
            $table->string('observacoes')->nullable()->default("");
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
        Schema::drop('pets');

    }
}
