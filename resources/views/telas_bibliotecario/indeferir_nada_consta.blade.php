@extends('layouts.app')

@section('conteudo')
    <!-- @section('navbar2.blade.php')
        Home
@endsection -->

    <style>
        hr {
            border: none;
            height: 2px;
            /* Set the hr color */
            color: #333; /* old IE */
            background-color: #1B2E4F; /* Modern Browsers */
            margin-top: 0px;
        }

        .center {
            margin: auto;
            width: 50%;
            padding: 10px;
        }

        h3 {
            font-size: 22px;
            margin-bottom: 5px;
        }

        .form-control {
            width: 97%;
        }
    </style>

    <div class="container-fluid background-blue" style="min-height:110vh">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card card-cadastro card-cadastro-servidor">
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <h2>Indeferir solicitação</h2>
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                              action="{{ route('atualizar-rejeicao',$requisicao->id) }}">
                            @csrf
                            <! -- Dados do documento -- !>
                            <div class="col-md-12 corpoFicha shadow my-4">
                                <div class="row">
                                    <div class="col-md-12 cabecalho py-2">
                                        <span class="tituloCabecalho">Dados Pessoais</span>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group py-2">
                                            <label class="pt-2 textoFicha" for="exampleFormControlInput1">Nome<span
                                                    style="color: red">*</span>:</label>
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                   placeholder="Nome"
                                                   value="{{$aluno->user->name}}"
                                                   disabled>
                                            <label class="pt-2 textoFicha" for="exampleFormControlInput1">CPF<span
                                                    style="color: red">*</span>:</label>
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                   placeholder="Nome"
                                                   value="{{$aluno->cpf}}"
                                                   disabled>

                                            <label class="pt-2 textoFicha" for="exampleFormControlInput1">Curso<span
                                                    style="color: red">*</span>:</label>
                                            <input type="text" class="form-control" id="nome" name="nome"
                                                   placeholder="Nome"
                                                   value="{{$aluno->perfil->curso->nome}}"
                                                   disabled>

                                            @if(isset($nadaConsta->anexo_comprovante_deposito))
                                                <div class="form-group">
                                                    <div class="forma-group">
                                                        <label class="pt-2 textoFicha" for="anexoArquivo">Comprovante de depósito:</label><br>
                                                        <a class="btn btn-primary" href="{{ route('baixa-anexo-comprovante', $requisicao->id) }}"
                                                           style="margin-bottom: 10px">Visualizar</a>
                                                    </div>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <! –– Explicação da rejeição ––>
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Motivação</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">
                                    <div class="form-group">
                                        <label for="exampleFormControlInput1">Explicação<span style="color: red">*</span>:</label>
                                        <input type="text" class="form-control" id="mensagem" name="mensagem"
                                               placeholder="Motivo do indeferimento da solicitação" value="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="col text-center" style="padding-top: 0px">
                                <a type="button" class="btn btn-secondary" style="margin-right: 30px" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">Voltar</a>
                                <button class="btn btn-danger">Rejeitar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @php

        @endphp
@endsection
