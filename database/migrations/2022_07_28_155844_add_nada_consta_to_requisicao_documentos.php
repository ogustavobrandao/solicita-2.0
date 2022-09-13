<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNadaConstaToRequisicaoDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicao_documentos', function (Blueprint $table) {

            $table->unsignedBigInteger('nada_consta_id')->nullable();
            $table->foreign('nada_consta_id')->references('id')->on('nada_constas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisicao_documento', function (Blueprint $table) {
            //
        });
    }
}
