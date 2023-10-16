@extends('layouts.app')

@section('conteudo')
<!-- @section('navbar2.blade.php')
    Home
@endsection -->

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="row mt-5 tituloFicha">
                <div class="col-md-12">
                    Editar Comprovante de depósito
                </div>
            </div>
            <! –– Dados Pessoais ––>


            <form action="{{ route('atualizar-nome-deposito', $deposito->id) }}" method="post">

                @csrf
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
                                    placeholder="Nome" value="{{ $deposito->autor_nome ?? $aluno->user->name }}">
                                    
                                
                                <input type="text" value="{{$requisicao_documento->id}}" name="parametro" hidden>

                                <label class="pt-2 textoFicha" for="exampleFormControlInput1">CPF<span
                                        style="color: red">*</span>:</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    placeholder="Nome" value="{{ $aluno->cpf }}" disabled>

                                <label class="pt-2 textoFicha" for="exampleFormControlInput1">Curso<span
                                        style="color: red">*</span>:</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    placeholder="Nome" value="{{ $requisicao->perfil->curso->nome }}" disabled>

                                <label class="pt-2 textoFicha" for="exampleFormControlInput1">Trabalho de Conclusão de
                                    Curso (TCC)<span style="color: red">*</span>:</label>
                                <div class="disabled">{!! $requisicao_documento->deposito->titulo_tcc !!}</div>

                                <div class="form-group">
                                    <div class="forma-group">
                                        <label class="pt-2 textoFicha" for="anexoArquivo">Trabalho de Conclusão de Curso
                                            (TCC):<span style="color: red">*</span>:</label><br>
                                        <a class="btn btn-primary"
                                            href="{{ route('baixar-anexo-tcc-deposito', $requisicao_documento->id) }}">
                                            Visualizar
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="forma-group">
                                        <label class="pt-2 textoFicha" for="anexoArquivo">Termo de autorização:<span
                                                style="color: red">*</span>:</label><br>
                                        <a class="btn btn-primary"
                                            href="{{ route('baixar-anexo-autorizacao-deposito', $requisicao_documento->id) }}">
                                            Visualizar
                                        </a>
                                        @if ($deposito->anexo_publicacao_parcial != null)
                                            <a class="btn btn-primary"
                                                href="{{ route('baixar-anexo_publicacao_parcial', $requisicao_documento->id) }}">
                                                Visualizar
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="https://assinador.iti.br/assinatura/index.xhtml"
                                        target="_blank">{{ 'Assinatura digital gov.br' }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>

                <!-- Botoes -->
                <div class="row justify-content-around mt-5">

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a type="button" class="btn btn-block"
                            style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                            href="{{ route('avaliar-deposito',$requisicao_documento->id) }}">Voltar
                        </a>
                    </div>

                    <div class="col-lg-3 col-md-4 col-sm-6">

                        <button type="submit" class="btn btn-warning btn-block"
                                style="background-color: #f8b133; border-radius: 0.5rem; color: white;">
                            Salvar
                        </button>
        
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
@endsection
