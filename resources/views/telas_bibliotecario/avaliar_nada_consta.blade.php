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
                        Comprovante Nada Consta
                    </div>
                </div>
                <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                      action="">
                    @csrf
                    <input type="hidden" name="nada_consta" value="{{$nadaConsta}}">

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
                                           value="{{\App\Models\User::where('id', $aluno->user_id)->first()->name}}"
                                           disabled>

                                    <label class="pt-2 textoFicha" for="exampleFormControlInput1">CPF<span
                                            style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome"
                                           value="{{\App\Models\User::where('id', $aluno->user_id)->first()->cpf}}"
                                           disabled>

                                    <label class="pt-2 textoFicha" for="exampleFormControlInput1">Curso<span
                                            style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome"
                                           value="{{\App\Models\Curso::where('id', $aluno->perfil->curso_id)->first()->nome}}"
                                           disabled>

                                    @if(isset($nadaConsta->anexo_comprovante_deposito))
                                        <div class="form-group">
                                            <div class="forma-group">
                                                <label class="pt-2 textoFicha" for="anexoArquivo">Comprovante de deposito:</label><br>
                                                <a class="btn btn-primary" href="{{ route('baixa-anexo-comprovante', $requisicao->id) }}"
                                                   style="margin-bottom: 10px">Visualizar</a>
                                            </div>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <div class="forma-group">
                                            <label class="pt-2 textoFicha" for="anexoArquivo">Termo de aceitação<span
                                                    style="color: red">*</span>:</label><br>
                                            <a class="btn btn-primary" href="{{ route('baixar-anexo-termo-aceitacao', $requisicao->id) }}"
                                               style="margin-bottom: 10px">Visualizar</a>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="https://assinador.iti.br/assinatura/index.xhtml" target="_blank">{{('Assinatura digital gov.br')}}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <hr>

                <!-- Botoes -->
                    <div class="row justify-content-between mt-5">
                        @if($requisicao->status == 'Em andamento')
                            <div class="col-lg-3 col-md-4 col-sm-6">
                                <a type="button" class="btn btn-block"
                                   style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                                   href="{{ route('listar-fichas') }}">Voltar</a>
                            </div>

                            <div class="col-lg-5 col-md-6 col-sm-6">
                                <a type="button" class="btn btn-danger btn-block"
                                   href="{{ route('indeferir-nada-consta',$requisicao->id) }}">Indeferir Comprovante</a>
                            </div>

                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-block" id="btn_enviar_ficha"
                                        style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;"
                                        href="#">
                                    Deferir Comprovante
                                </button>
                            </div>
                        @else
                            <div class="col-md-4">
                                <a type="button" class="btn btn-block"
                                   style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                                   href="{{ route('listar-fichas') }}">Voltar</a>
                            </div>

                            <div class="col-md-4">
                                <a type="button" class="btn btn-block" id="btn_gerar_ficha"
                                   style="background-color: #1A2876; border-radius: 0.5rem; color: white;">Gerar Ficha</a>
                            </div>

                            <div class="col-md-4">
                                <button type="button" class="btn btn-block"
                                        style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;"
                                        href="#" id="btn_enviar_ficha">
                                    Enviar
                                </button>
                            </div>
                        @endif
                        <input type="hidden" name="nada_consta_id" value="{{$nadaConsta->id}}">
                        <input type="hidden" name="aluno_id" value="{{$aluno->id}}">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script>
        $("#btn_gerar_ficha").on("click",function () {
            $('#formRequisicao').attr("action", "{{route('preview')}}");
        });

        $("#btn_enviar_ficha").click(function () {
            $('#formRequisicao').attr("action", "{{route('deferir-nada-consta')}}");
        });

        var sel = $('#produto');
        var selected = sel.val(); // cache selected value, before reordering
        var opts_list = sel.find('option');
        opts_list.sort(function(a, b) { return $(a).text() > $(b).text() ? 1 : -1; });
        sel.html('').append(opts_list);
        sel.val(selected); // set cached selected value

    </script>

@endsection
