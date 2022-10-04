<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNadaConstasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nada_constas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('anexo_comprovante_deposito')->nullable();
            $table->string('anexo_termo_aceitacao')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nada_constas');
    }
}
