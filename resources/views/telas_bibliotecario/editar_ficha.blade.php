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
                    @if($requisicao->status == "Rejeitado")
                        <div class="alert alert-warning " role="alert">
                            <div class="d-flex justify-content-center">
                                <h3>Este documento já foi analisado e rejeitado por: <strong>{{ \App\Models\User::find($bibliotecario->user_id)->name }} em: {{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}</strong></h3>
                            </div>
                            <div class="d-flex justify-content-center">
                                <p>Motivo: <strong> {{ $requisicao->anotacoes }} </strong></p>
                            </div>
                        </div>
                    @elseif($requisicao->status == "Concluido")
                        <div class="alert alert-warning " role="alert">
                            <div class="d-flex justify-content-center">
                                <h3>Este documento já foi analisado e gerado por: <strong>{{ \App\Models\User::find($bibliotecario->user_id)->name }}</strong>, em: <strong>{{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}</strong>.</h3>
                            </div>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <h2>Ficha Catalográfica - @if($tipo_documento == 1)Monografia
                            @elseif($tipo_documento == 2)Tese
                            @elseif($tipo_documento == 3)Trabalho de Conclusão de Curso
                            @elseif($tipo_documento == 4)Produto Educacional
                            @elseif($tipo_documento == 5)Dissertação
                            @endif</h2>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                          action="{{ route('atualizar-ficha') }}">
                        @csrf
                        <input type="hidden" name="tipo_documento" value="{{$tipo_documento}}">
                        <! –– Dados Pessoais ––>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Dados Pessoais do Solicitante</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Nome:<span style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="nome" name="nome"
                                           placeholder="Nome" value="{{\App\Models\User::where('id', $aluno->user_id)->first()->name}}"
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">CPF:<span style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf"
                                           placeholder="Nome" value="{{$aluno->cpf}}"
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Email:<span style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Nome" value="{{\App\Models\User::where('id', $aluno->user_id)->first()->email}}"
                                           disabled>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Curso:<span style="color: red">*</span>:</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="Nome" value="{{\App\Models\Perfil::where('aluno_id', $aluno->id)->first()->default}}"
                                           disabled>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <! -- Dados para o bibliotecario -- !>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Dados para o Bibliotecario</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-left: 15px;">
                                <div class="form-group">
                                    <label for="cutter">Cutter: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="cutter" name="cutter"
                                           placeholder="Digite o código de Cutter" @if($fichaCatalografica->cutter == null)
                                           value="" required @else value="{{ $fichaCatalografica->cutter }}" disabled @endif>
                                </div>

                                <div class="form-group">
                                    <label for="classificacao">Classificação: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="classificacao" name="classificacao"
                                           placeholder="Digite a classificação" @if($fichaCatalografica->classificacao == null) value="" required
                                    @else value="{{ $fichaCatalografica->classificacao  }}" disabled @endif>
                                </div>
                            </div>
                        </div>
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
                                    <label for="autor_nome">Nome do Autor: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor_nome" name="autor_nome"
                                           placeholder="Digite o nome do Autor" value="{{$fichaCatalografica->autor_nome}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="autor_sobrenome">Sobrenome do Autor: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="autor_sobrenome" name="autor_sobrenome"
                                           placeholder="Digite o sobrenome do Autor" value="{{$fichaCatalografica->autor_sobrenome}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Título: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="titulo" name="titulo"
                                           placeholder="Digite o Título" value="{{$fichaCatalografica->titulo}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="subtitulo">Subtitulo:</label>
                                    <input type="text" class="form-control" id="subtitulo" name="subtitulo"
                                           placeholder="Digite o Subtítulo" value="{{$fichaCatalografica->subtitulo}}">
                                </div>
                                <div class="form-group">
                                    <label for="local">Local: <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="local" name="local"
                                           placeholder="Digite o Local" value="{{$fichaCatalografica->local}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ano">Ano: <span style="color: red">*</span></label>
                                    <input class="form-control" type="number" min="1900" max="2099" step="1" name="ano"
                                           value="{{$fichaCatalografica->ano}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="folhas">Folhas: <span style="color: red">*</span></label>
                                    <input type="number" class="form-control" id="folhas" name="folhas"
                                           placeholder="Digite a Quantidade de Folhas" value="{{$fichaCatalografica->folhas}}" required>
                                </div>
                                <div class="form-group">
                                    <label for="ilustracao">Ilustração <span style="color: red">*</span></label>
                                    <select class="form-control" id="ilustracao" name="ilustracao">
                                        <option value="colorido" @if($fichaCatalografica->ilustracao == 'colorido') selected @endif>Colorido</option>
                                        <option value="preto_branco" @if($fichaCatalografica->ilustracao == 'preto_branco') selected @endif>Preto e Branco</option>
                                        <option value="nao_possui" @if($fichaCatalografica->ilustracao == 'nao_possui') selected @endif>Não Possui</option>
                                    </select>
                                </div>
                                <div class ="forma-group">
                                    <label for="anexoArquivo">Visualizar Anexo: <span style="color: red">*</span> </label><br>
                                    <a class="btn btn-primary" href="{{ route('baixar-anexo', $requisicao->id) }}" style="margin-bottom: 10px">Baixar anexo</a>
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
                                        <label for="nome_orientador">Nome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="sobrenome_orientador" name="nome_orientador"
                                               placeholder="Digite o Nome do Orientador" value="{{$documento->nome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_orientador">Sobrenome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="sobre_orientador" name="sobrenome_orientador"
                                               placeholder="Digite o Sobreome do Orientador" value="{{$documento->sobrenome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado" @if($documento->titulacao_orientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_orientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_orientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_orientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nome_coorientador">Nome do Coorientador: </label>
                                        <input type="text" class="form-control" id="nome_coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="{{$documento->nome_coorientador}}" name="nome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_coorientador">Sobrenome do Coorientador: </label>
                                        <input type="text" class="form-control" id="sobrenome_coorientador"
                                               placeholder="Digite o Sobrenome do Coorientador" value="{{$documento->sobrenome_coorientador}}" name="sobrenome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option @if($documento->titulacao_coorientador == null) selected @endif>Sem Coorientador</option>
                                            <option value="graduado" @if($documento->titulacao_coorientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_coorientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_coorientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_coorientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Curso: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="curso" name="curso"
                                               placeholder="Digite o Nome do Curso" value="{{$documento->curso}}" required disabled>
                                        <input type="hidden" class="form-control" id="curso" name="curso"
                                               placeholder="Digite o Nome do Curso" value="{{$documento->curso}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="{{$documento->campus}}" required disabled>
                                        <input type="hidden" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="{{$documento->campus}}" required>
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
                                        <label for="orientador">Nome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="nome_orientador" name="nome_orientador"
                                               placeholder="Digite Nome do Orientador" value="{{$documento->nome_orientador}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_orientador">Sobrenome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="sobrenome_orientador" name="sobrenome_orientador"
                                               placeholder="Digite o Sobreome do Orientador" value="{{$documento->nome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="titulo_orientador">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado" @if($documento->titulacao_orientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_orientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_orientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_orientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nome_coorientador">Nome do Coorientador:</label>
                                        <input type="text" class="form-control" id="nome_coorientador" name="nome_coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="{{$documento->nome_coorientador}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_coorientador">Sobrenome do Coorientador: </label>
                                        <input type="text" class="form-control" id="sobrenome_coorientador"
                                               placeholder="Digite o Sobrenome do Coorientador" value="{{$documento->sobrenome_coorientador}}" name="sobrenome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="titulo-coorientador">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option @if($documento->titulacao_coorientador == null) selected @endif>Sem Coorientador</option>
                                            <option value="graduado" @if($documento->titulacao_coorientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_coorientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_coorientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_coorientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="programa">Programa: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="programa" name="programa"
                                               placeholder="Digite o Nome do Programa" value="{{$documento->programa}}">
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
                                        <label for="orientador">Nome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="nome_orientador" name="nome_orientador"
                                               placeholder="Digite o Nome do Orientador" value="{{$documento->nome_orientador}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_orientador">Sobrenome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="sobrenome_orientador" name="sobrenome_orientador"
                                               placeholder="Digite o Sobreome do Orientador" value="{{$documento->nome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado" @if($documento->titulacao_orientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_orientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_orientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_orientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nome_coorientador">Nome do Coorientador: </label>
                                        <input type="text" class="form-control" id="nome_coorientador" name="nome_coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="{{$documento->nome_coorientador}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_coorientador">Sobrenome do Coorientador: </label>
                                        <input type="text" class="form-control" id="sobrenome_coorientador"
                                               placeholder="Digite o Sobrenome do Coorientador" value="{{$documento->sobrenome_coorientador}}" name="sobrenome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option @if($documento->titulacao_coorientador == null) selected @endif>Sem Coorientador</option>
                                            <option value="graduado" @if($documento->titulacao_coorientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_coorientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_coorientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_coorientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Curso: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="curso" name="curso"
                                               placeholder="Digite o Nome do Curso" value="{{$documento->curso}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="{{$documento->campus}}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="referencias">Referências: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="referencia" name="referencia"
                                               placeholder="Digite as referências" value="{{$documento->referencia}}">
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
                                               placeholder="Digite o Nome do Programa" value="{{$documento->programa}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="{{$documento->campus}}" disabled>
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
                                        <label for="nome_orientador">Nome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="nome_orientador" name="nome_orientador"
                                               placeholder="Digite o Nome do Orientador" value="{{$documento->nome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_orientador">Sobrenome do Orientador: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="sobrenome_orientador" name="sobrenome_orientador"
                                               placeholder="Digite o Sobreome do Orientador" value="{{$documento->nome_orientador}}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Orientador: <span style="color: red">*</span></label>
                                        <select class="form-control" id="titulacao_orientador" name="titulacao_orientador">
                                            <option value="graduado" @if($documento->titulacao_orientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_orientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_orientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_orientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="nome_corientador">Nome do Coorientador: </label>
                                        <input type="text" class="form-control" id="nome_coorientador"
                                               placeholder="Digite o Nome do Coorientador" value="{{$documento->nome_coorientador}}" name="nome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="sobrenome_coorientador">Sobrenome do Coorientador: </label>
                                        <input type="text" class="form-control" id="sobrenome_coorientador"
                                               placeholder="Digite o Sobrenome do Coorientador" value="{{$documento->sobrenome_coorientador}}" name="sobrenome_coorientador">
                                    </div>

                                    <div class="form-group">
                                        <label for="subtitulo">Titulação do Coorientador:</label>
                                        <select class="form-control" id="titulacao_coorientador" name="titulacao_coorientador">
                                            <option @if($documento->titulacao_coorientador == null) selected @endif>Sem Coorientador</option>
                                            <option value="graduado" @if($documento->titulacao_coorientador == 'graduado') selected @endif>Graduado</option>
                                            <option value="especialista" @if($documento->titulacao_coorientador == 'especialista') selected @endif>Especialista</option>
                                            <option value="mestre" @if($documento->titulacao_coorientador == 'mestre') selected @endif>Mestre</option>
                                            <option value="doutor" @if($documento->titulacao_coorientador == 'doutor') selected @endif>Doutor</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="programa">Programa: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="programa" name="programa"
                                               placeholder="Digite o Nome do Programa" value="{{$documento->programa}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="campus">Campus: <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" id="campus" name="campus"
                                               placeholder="Digite o Nome do Campus" value="{{$documento->campus}}" required disabled>
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
                                           placeholder="1. Palavras-chave" value="{{$palavrasChave[0]->palavra}}">
                                </div>

                                <div class="form-group">
                                    <label for="segunda">Segunda Palavra:<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="segunda" name="segunda_chave"
                                           placeholder="2. Palavras-chave" value="{{$palavrasChave[1]->palavra}}">
                                </div>

                                <div class="form-group">
                                    <label for="terceira">Terceira Palavra:<span style="color: red">*</span></label>
                                    <input type="text" class="form-control" id="terceira" name="terceira_chave"
                                           placeholder="3. Palavras-chave" value="{{$palavrasChave[2]->palavra}}">
                                </div>
                                @if(sizeof($palavrasChave) >= 4 )
                                    <input type="hidden" name="palavra_chave4_id" value="{{$palavrasChave[3]->id}}">
                                    <div class="form-group">
                                        <label for="quarta">Quarta Palavra:</label>
                                        <input type="text" class="form-control" id="quarta" name="quarta_chave"
                                               placeholder="4. Palavras-chave" value="{{$palavrasChave[3]->palavra}} ">
                                    </div>
                                    @if(sizeof($palavrasChave) == 5)
                                        <input type="hidden" name="palavra_chave5_id" value="{{$palavrasChave[4]->id}}">
                                        <div class="form-group">
                                            <label for="quinta">Quinta Palavra:</label>
                                            <input type="text" class="form-control" id="quinta" name="quinta_chave"
                                                   placeholder="5. Palavras-chave" value="{{$palavrasChave[4]->palavra}} ">
                                        </div>
                                    @endif
                                @endif
                            </div>
                            <div class="col text-center" style="padding-top: 0px">
                                <a type="button" class="btn btn-secondary" style="margin-right: 30px" href="{{ route('listar-fichas') }}">Voltar</a>
                                @if($requisicao->status == 'Em andamento')
                                    <a type="button" class="btn btn-danger" href="{{ route('rejeitar-ficha',$requisicao->id) }}">Rejeitar solicitação</a>
                                @endif
                                <button type="submit" class="btn btn-primary-lmts" style="margin-left: 30px" href="#">Gerar ficha</button>
                            </div>
                            <input type="hidden" name="ficha_catalografica_id" value="{{$fichaCatalografica->id}}">
                            <input type="hidden" name="palavra_chave1_id" value="{{$palavrasChave[0]->id}}">
                            <input type="hidden" name="palavra_chave2_id" value="{{$palavrasChave[1]->id}}">
                            <input type="hidden" name="palavra_chave3_id" value="{{$palavrasChave[2]->id}}">

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
