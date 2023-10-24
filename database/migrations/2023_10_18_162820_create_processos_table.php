<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processos', function (Blueprint $table) {
            $table->id();
            $table->string('doc_tratamento')->nullable();
            $table->enum('tipo_processo', ['alt_cadastral', 'antecipacao', 'complementar', 'disciplina', 'educacao_fisica', 'excepcional']);
            $table->date('data_requerimento')->nullable();
            $table->string('motivo')->nullable();
            $table->string('semestre_conclusao')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processos');
    }
}
