<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('orientador');
            $table->string('titulacao_orientador');
            $table->string('coorientador')->nullable();
            $table->string('titulacao_coorientador')->nullable();
            $table->string('programa');

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
        Schema::dropIfExists('teses');
    }
}
