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
                      action="{{route('preview')}}">
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
                                                <label class="pt-2 textoFicha" for="anexoArquivo">Comprovante de depósito:</label><br>
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

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-between mt-5">
                        <div class="col-md-4">
                            <a type="button" class="btn btn-block"
                               style="background-color: var(--padrao); border-radius: 0.5rem; color: white;"
                               href="{{ route('listar-fichas') }}">Voltar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
