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
                        <h2>Rejeitar documento</h2>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                          action="{{ route('atualizar-rejeicao',$requisicao->id) }}">
                        @csrf
                        <! -- Dados do documento -- !>
                        <div class="row">
                            <div class="col-md-12">
                                <h3 style="color: #4c110f"><strong>Dados da ficha que será rejeitada: </strong></h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nome do solicitante:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="" value="{{$usuario->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email do solicitante:</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="" value="{{$usuario->email}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Autor do documento:</label>
                                    <input type="text" class="form-control" id="autor_nome" name="autor_nome"
                                           placeholder="" value="{{$ficha->autor_nome}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Titulo do documento:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           placeholder="Mensagem explicativa" value="{{$ficha->titulo}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Tipo do documento:</label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           placeholder="Mensagem explicativa" value="{{\App\Models\TipoDocumento::find($ficha->tipo_documento_id)->first()->tipo}}" disabled>
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
                                           placeholder="Motivo da rejeição da ficha" value="" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col text-center" style="padding-top: 0px">
                            <a type="button" class="btn btn-secondary" style="margin-right: 30px" href="{{ route('editar-ficha', $requisicao->id) }}">Voltar</a>
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
