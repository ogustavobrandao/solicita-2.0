<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepositoToRequisicaoDocumentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('requisicao_documentos', function (Blueprint $table) {
            $table->unsignedBigInteger('deposito_id')->nullable();
            $table->foreign('deposito_id')->references('id')->on('depositos');
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
