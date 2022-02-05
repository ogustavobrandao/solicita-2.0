<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBibliotecariosToRequisicaoDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicao_documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('bibliotecario_id')->nullable();
            $table->foreign('bibliotecario_id')->references('id')->on('bibliotecarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('requisicao_documentos', function (Blueprint $table) {
            //
        });
    }
}
