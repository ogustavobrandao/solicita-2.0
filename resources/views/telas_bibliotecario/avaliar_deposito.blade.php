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
                        Comprovante de depósito
                    </div>
                </div>
                <! –– Dados Pessoais ––>

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
                                    value="{{$requisicao->perfil->curso->nome}}"
                                    disabled>

                                <label class="pt-2 textoFicha" for="exampleFormControlInput1">Trabalho de Conclusão de Curso (TCC)<span
                                        style="color: red">*</span>:</label>
                                <input type="text" class="form-control" id="nome" name="nome"
                                    placeholder="Nome"
                                    value="{{$requisicao_documento->deposito->titulo_tcc}}"
                                    disabled>

                                <div class="form-group">
                                    <div class="forma-group">
                                        <label class="pt-2 textoFicha" for="anexoArquivo">Trabalho de Conclusão de Curso (TCC):<span
                                                style="color: red">*</span>:</label><br>
                                        <a class="btn btn-primary" href="{{ route('baixar-anexo-tcc-deposito', $requisicao_documento->id) }}">
                                            Visualizar
                                        </a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="forma-group">
                                        <label class="pt-2 textoFicha" for="anexoArquivo">Termo de autorização:<span
                                                style="color: red">*</span>:</label><br>
                                        <a class="btn btn-primary" href="{{ route('baixar-anexo-autorizacao-deposito', $requisicao_documento->id) }}">
                                            Visualizar
                                        </a>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a href="https://assinador.iti.br/assinatura/index.xhtml" target="_blank">{{('Assinatura digital gov.br')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <hr>

            <!-- Botoes -->
                <div class="row justify-content-between mt-5">
                    @if($requisicao_documento->status == 'Em andamento')
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <a type="button" class="btn btn-block"
                            style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                            href="{{ route('listar-fichas') }}">Voltar</a>
                        </div>

                        <div class="col-lg-5 col-md-6 col-sm-6">
                            <button type="button" class="btn btn-danger btn-block" style="border-radius: 0.5rem"
                                data-toggle="modal" data-target="#modalIndeferirSolicitacao">
                                Indeferir solicitação
                            </button>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <button type="button" class="btn btn-block" id="btn_enviar_ficha"
                                    data-toggle="modal" data-target="#modalDeferirSolicitacao"
                                    style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;"
                                    href="#">
                                Deferir solicitação
                            </button>
                        </div>
                        <div class="modal fade" id="modalDeferirSolicitacao" tabindex="-1" aria-labelledby="modalDeferirSolicitacaoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalDeferirSolicitacaoLabel">Deferir solicitação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-12">
                                            <label for="btnGerarDocumento">1ª etapa</label>
                                            <form action="{{route('gerar-deposito', $requisicao_documento->id)}}" method="POST">
                                                @csrf
                                                <button id="btnGerarDocumento" type="submit" class="btn btn-default btn-block" style="background-color: var(--biblioteca); border-radius: 0.5rem; color: white;">Gerar documento</button>
                                            </form>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label for="btnAssinaturaGov">2ª etapa</label>
                                            <a id="btnAssinaturaGov" href="https://assinador.iti.br/assinatura/index.xhtml" target="_blank" class="btn btn-block"
                                                style="background-color: var(--biblioteca); border-radius: 0.5rem; color: white;">
                                                <i class="fa-solid fa-arrow-up-right-from-square"></i>
                                                Assinatura digital gov.br
                                            </a>
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <label for="comprovante">3ª etapa</label>
                                            <form id="deferirDepositoForm" action="{{route('deferir-deposito')}}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="requisicao_documento_id" value="{{$requisicao_documento->id}}">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="comprovante" name="comprovante">
                                                    <label class="custom-file-label" for="comprovante">Selecione o arquivo assinado</label>
                                                </div>
                                            </form>
                                        </div>
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
                                                <button type="submit" form="deferirDepositoForm" class="btn btn-block"
                                                    style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;">
                                                    Enviar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="modalIndeferirSolicitacao" tabindex="-1" aria-labelledby="modalIndeferirSolicitacaoLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalIndeferirSolicitacaoLabel">Indeferir solicitação</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Tem certeza que deseja indeferir a solicitação do discente {{$aluno->user->name}}?</p>
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
                                                <form action="{{route('indeferir-deposito')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="requisicao_documento_id" value="{{$requisicao_documento->id}}">
                                                    <button type="submit" class="btn btn-block"
                                                        style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;">
                                                        Confirmar
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block"
                            style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                            href="{{ route('listar-fichas') }}">Voltar</a>
                        </div>

                        <div class="col-md-4">
                            <form action="{{route('gerar-deposito', $requisicao_documento->id)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-block" style="background-color: #1A2876; border-radius: 0.5rem; color: white;">Gerar documento</button>
                            </form>
                        </div>

                        <div class="col-md-4">
                            <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                                action="{{route('deferir-deposito')}}">
                                @csrf
                                <input type="hidden" name="deposito" value="{{$deposito}}">
                                <input type="hidden" name="deposito_id" value="{{$deposito->id}}">
                                <input type="hidden" name="aluno_id" value="{{$aluno->id}}">

                                <button type="submit" class="btn btn-block"
                                        style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;"
                                        href="#" id="btn_enviar_ficha">
                                    Enviar
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        var sel = $('#produto');
        var selected = sel.val(); // cache selected value, before reordering
        var opts_list = sel.find('option');
        opts_list.sort(function(a, b) { return $(a).text() > $(b).text() ? 1 : -1; });
        sel.html('').append(opts_list);
        sel.val(selected); // set cached selected value

    </script>

@endsection
