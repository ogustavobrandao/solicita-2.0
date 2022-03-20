<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDissertacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dissertacaos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome_orientador');
            $table->string('sobrenome_orientador');
            $table->string('nome_coorientador')->nullable();
            $table->string('sobrenome_coorientador')->nullable();
            $table->string('nome_segundo_coorientador')->nullable();
            $table->string('sobrenome_segundo_coorientador')->nullable();
            $table->string('programa');
            $table->string('campus');

            $table->unsignedBigInteger('ficha_catalografica_id');
            $table->foreign('ficha_catalografica_id')->references('id')->on('ficha_catalograficas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dissertacaos');
    }
}
