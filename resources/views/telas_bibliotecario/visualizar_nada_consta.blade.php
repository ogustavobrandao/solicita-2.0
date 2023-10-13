@extends('layouts.app')

@section('conteudo')
    <!-- @section('navbar2.blade.php')
        Home
@endsection -->

    <style>
        select[readonly] {
            background: #eee; /*Simular campo inativo - Sugestão @GabrielRodrigues*/
            pointer-events: none;
            touch-action: none;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="row mt-5 tituloFicha">
                    <div class="col-md-12">
                        Comprovante Nada Consta
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                      action="{{route('preview', ['requisicao_id' => $requisicao])}}">
                    @csrf
                    <input type="hidden" readonly name="tipo_documento" value="{{$nadaConsta}}">

                    <! –– Dados Pessoais ––>

                    <div class="col-md-12 corpoFicha shadow my-4">
                        <div class="row">
                            <div class="col-md-12 cabecalho py-2">
                                <span class="tituloCabecalho">Dados Pessoais</span>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group pt-2">
                                    <label class="textoFicha" for="exampleFormControlInput1">Nome<span
                                            style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome"
                                           value="{{$aluno->user->name}}"
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label class="textoFicha" for="exampleFormControlInput1">CPF<span
                                            style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome"
                                           value="{{$aluno->cpf}}"
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label class="textoFicha" for="exampleFormControlInput1">Curso<span
                                            style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome"
                                           value="{{$requisicao->perfil->curso->nome}}"
                                           disabled>
                                </div>
                                @if(isset($nadaConsta->anexo_comprovante_deposito))
                                    <div class="form-group">
                                        <label class="textoFicha" for="anexoArquivo">Comprovante de nada consta:</label><br>
                                        <a class="btn btn-primary" href="{{ route('baixa-anexo-comprovante', $requisicao_documento->id) }}"
                                            style="margin-bottom: 10px">Visualizar</a>
                                    </div>
                                @endif

                                @foreach ($requisicao_documento->retificacoes as $retificacao)
                                    @if ($loop->first)
                                        <h4>Retificações</h4>
                                    @endif
                                    <div class="form-group">
                                        <label class="textoFicha" for="anexoArquivo">Arquivo anexado:</label><br>
                                        <a class="btn btn-primary" href="{{ route('baixar-anexo-retificacao', $retificacao->id) }}"
                                            style="margin-bottom: 10px">Visualizar</a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between mt-5">
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block"
                               style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                               href="{{ route('listar-fichas') }}">Voltar</a>
                        </div>
                        <div class="col-md-4">
                            <button type="button" class="btn btn-block" data-toggle="modal" data-target="#modalRetificarSolicitacao"
                               style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;">Retificar</button>
                        </div>
                    </div>
                </form>
                <div class="modal fade" id="modalRetificarSolicitacao" tabindex="-1" aria-labelledby="modalRetificarSolicitacaoLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalRetificarSolicitacaoLabel">Retificar solicitação</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja retificar a solicitação do discente {{$aluno->user->name}}?</p>
                                <form id="formRetificar" action="{{route('retificar-requisicao-documento')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="requisicao_documento_id" value="{{$requisicao_documento->id}}">
                                    <div class="form-group">
                                        <label for="anexo">Anexar arquivo:</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="anexo" name="anexo">
                                            <label class="custom-file-label" for="anexo">Selecione o arquivo</label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer px-0 justify-content-center">
                                <div class="row justify-content-between w-100">
                                    <div class="col-md-3">
                                        <button type="button" class="btn btn-block" data-dismiss="modal"
                                            style="background-color: var(--padrao); border-radius: 0.5rem; color: white;">
                                            Voltar
                                        </button>
                                    </div>
                                    <div class="col-md-5">
                                        <button type="submit" data-tar class="btn btn-block" form="formRetificar"
                                            style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;">
                                            Confirmar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script>
        document.querySelector('.custom-file-input').addEventListener('change',function(e){
            var fileName = document.getElementById("anexo").files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    </script>
@endsection
