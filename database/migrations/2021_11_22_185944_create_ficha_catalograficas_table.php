<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFichaCatalograficasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha_catalograficas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('cutter')->nullable();
            $table->string('classificacao')->nullable();
            $table->string('autor');
            $table->string('titulo');
            $table->string('subtitulo')->nullable();
            $table->string('local');
            $table->string('ano');
            $table->integer('folhas');
            $table->string('ilustracao');
            $table->unsignedBigInteger('tipo_documento_id');
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ficha_catalograficas');
    }
}
