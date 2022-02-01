@extends('layouts.app')

@section('conteudo')
    <!-- @section('navbar')
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
                        <h2>Ficha Catalográfica - @if($tipo_documento == 1)Monografia
                            @elseif($tipo_documento == 2)Tese
                            @elseif($tipo_documento == 3)Trabalho de Conclusão de Curso
                            @elseif($tipo_documento == 4)Produto Educacional
                            @elseif($tipo_documento == 5)Dissertação
                            @endif</h2>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                          action="{{ route('criarDocumentoBibli') }}">
                        @csrf
                        <input type="hidden" name="tipo_documento" value="{{$tipo_documento}}">
                        <! –– Dados Pessoais ––>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Dados Pessoais</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nome<span style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome" value="{{\Illuminate\Support\Facades\Auth::user()->name}}"
                                           disabled>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_perfil" value="{{ $id_perfil }}">
                        <hr>
                        <! –– Dados do Trabalho ––>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Dados do Trabalho</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="autor">Autor: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor" name="autor"
                                           placeholder="Digite o nome do Autor" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Titulo: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           placeholder="Digite o Titulo" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="subtitulo">Subtitulo:</label>
                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo"
                                           placeholder="Digite o Subtitulo" value="">
                                </div>
                                <div class="form-group">
                                    <label for="local">Local: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="local" name="local"
                                           placeholder="Digite o Local" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="ano">Ano: <span style="color: red">*</span></label>
                                    <input class="form-control" type="number" min="1900" max="2099" step="1" name="ano"
                                           value="{{date('Y')}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="folhas">Folhas: <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="folhas" name="folhas"
                                           placeholder="Digite a Quantidade de Folhas" value="" required>
                                </div>
                                <div class="form-group">
                                    <label for="ilustracao">Ilustração <span style="color: red">*</span></label>
                                    <select class="form-control" id="ilustracao" name="ilustracao">
                                        <option value="colorido">Colorido</option>
                                        <option value="preto_branco">Preto e Branco</option>
                                        <option value="nao_possui">Não Possui</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <hr>

                        <! –– Dados Especificos ––>
                        @if($tipo_documento == 1)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Monografia</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">
                                    <div class="form-group">
                                        <label for="orientador">Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="orientador" name="orientador"
                                               placeholder="Digite o Orientador" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="orientador">Coorientador: </label>
                                        <input type="text" class="form-control" id="coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="" name="coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option>Sem Coorientador</option>
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Curso: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="curso" name="curso"
                                               placeholder="Digite o Nome do Curso" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @elseif($tipo_documento == 2)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Tese</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">
                                    <div class="form-group">
                                        <label for="orientador">Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="orientador" name="orientador"
                                               placeholder="Digite o Orientador" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="titulo_orientador">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="coorientador">Coorientador:</label>
                                        <input type="text" class="form-control" id="coorientador" name="coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="titulo-coorientador">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="programa">Programa: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="programa" name="programa"
                                               placeholder="Digite o Nome do Programa" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @elseif($tipo_documento == 3)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Trabalho de Conclusão de Curso</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">
                                    <div class="form-group">
                                        <label for="orientador">Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="orientador" name="orientador"
                                               placeholder="Digite o Orientador" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="orientador">Coorientador: </label>
                                        <input type="text" class="form-control" id="coorientador" name="coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Curso: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="curso" name="curso"
                                               placeholder="Digite o Nome do Curso" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="referencias">Referências: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="referencia" name="referencia"
                                               placeholder="Digite as referências" value="">
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @elseif($tipo_documento == 4)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Produto Educacional</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">

                                    <div class="form-group">
                                        <label for="programa">Programa: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="programa" name="programa"
                                               placeholder="Digite o Nome do Programa" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="">
                                    </div>

                                </div>
                            </div>
                            <hr>
                        @elseif($tipo_documento == 5)
                            <div class="row">
                                <div class="col-md-12">
                                    <h3>Dissertação</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12" style="margin-left: 15px;">
                                    <div class="form-group">
                                        <label for="orientador">Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="orientador" name="orientador"
                                               placeholder="Digite o Orientador" value="" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="orientador">Coorientador: </label>
                                        <input type="text" class="form-control" id="coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="" name="coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option>Sem Coorientador</option>
                                            <option value="graduado">Graduado</option>
                                            <option value="especialista">Especialista</option>
                                            <option value="mestre">Mestre</option>
                                            <option value="doutor">Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="programa">Programa: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="programa" name="programa"
                                               placeholder="Digite o Nome do Programa" value="">
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Palavras-chave</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="primeira">Primeira Palavra:<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="primeira" name="primeira_chave"
                                           placeholder="1. Palavras-chave" value="">
                                </div>

                                <div class="form-group">
                                    <label for="segunda">Segunda Palavra:<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="segunda" name="segunda_chave"
                                           placeholder="2. Palavras-chave" value="">
                                </div>

                                <div class="form-group">
                                    <label for="terceira">Terceira Palavra:<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="terceira" name="terceira_chave"
                                           placeholder="3. Palavras-chave" value="">
                                </div>

                                <div class="form-group">
                                    <label for="quarta">Quarta Palavra:</label>
                                    <input type="text" class="form-control" id="quarta" name="quarta_chave"
                                           placeholder="4. Palavras-chave" value="">
                                </div>

                                <div class="form-group">
                                    <label for="quinta">Quinta Palavra:</label>
                                    <input type="text" class="form-control" id="quinta" name="quinta_chave"
                                           placeholder="5. Palavras-chave" value="">
                                </div>
                            </div>
                            <div class="col text-center" style="padding-top: 0px">
                                <a type="button" class="btn btn-secondary" style="margin-right: 10px" href="{{ route('prepara-requisicao-bibli') }}">Voltar</a>
                                <button type="submit" class="btn btn-primary-lmts" style="margin-left: 10px" href="#">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
