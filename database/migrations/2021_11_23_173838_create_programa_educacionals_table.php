<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramaEducacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programa_educacionals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
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
        Schema::dropIfExists('programa_educacionals');
    }
}
