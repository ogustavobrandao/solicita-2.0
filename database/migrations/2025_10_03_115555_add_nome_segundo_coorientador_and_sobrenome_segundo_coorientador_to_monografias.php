<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNomeSegundoCoorientadorAndSobrenomeSegundoCoorientadorToMonografias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('monografias', function (Blueprint $table) {
            $table->string( 'nome_segundo_coorientador')->nullable();
            $table->string( 'sobrenome_segundo_coorientador')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('monografias', function (Blueprint $table) {
            $table->dropColumn(['nome_segundo_coorientador', 'sobrenome_segundo_coorientador']);
        });
    }
}
