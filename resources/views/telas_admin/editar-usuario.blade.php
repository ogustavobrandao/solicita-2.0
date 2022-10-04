@extends('layouts.app')


@section('conteudo')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 corpoRequisicao shadow">

                <div class="tituoRequisicao mt-3 p-0">
                    Editar Usuário - {{ucfirst($usuario->tipo)}}
                </div>

                <form class="my-3" action="{{  route('atualizar-usuario')  }}" method="POST">
                @csrf

                <!--NOME-->

                    <div class="row justify-content-center">
                        <div class="form-group col-md-12">
                            <label for="nome" class="textoFicha row px-3">Nome:
                                <input id="nome" type="name"
                                       class="form-control @error('name') is-invalid @enderror "
                                       name="name" value="{{ $usuario->name }}" required autocomplete="name"
                                       placeholder="Nome Completo">
                            </label>
                            @error('name')
                            <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--EMAIL-->

                    <div class="row justify-content-center">
                        <div class="form-group col-md-12">
                            <label for="email" class="textoFicha row px-3">E-mail:
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror "
                                       name="email" value="{{ $usuario->email }}" required autocomplete="email"
                                       placeholder="E-Mail">
                            </label>
                            @error('email')
                            <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <!--ITENS ALUNO-->

                    @if($usuario->tipo == 'aluno')
                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="email" class="textoFicha px-3 row">CPF:
                                    <input id="cpf" type="cpf"
                                           class="form-control @error('cpf') is-invalid @enderror "
                                           name="cpf" value="{{ $usuarioEspecifico->cpf }}" required autocomplete="cpf"
                                           placeholder="CPF">
                                </label>
                                @error('cpf')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="curso" class="row px-3 textoFicha">Curso:
                                    <select name="curso" id="curso" class="form-control @error('curso') is-invalid @enderror" required>
                                        @foreach($cursos as $curso)
                                            <option value="{{$curso->id}}" @if ($perfil->curso_id== $curso->id) selected @endif>{{$curso->nome}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('curso')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="situacao" class="row px-3 textoFicha"> Situação:
                                    <select name="situacao" id="situacao" class="form-control @error('situacao') is-invalid @enderror" required>
                                        @foreach($situacoes as $situacao)
                                            <option value="{{$situacao}}" @if ($perfil->situacao == $situacao) selected @endif>{{$situacao}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('situacao')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="unidade" class="row px-3 textoFicha">Unidade:
                                    <select name="unidade" id="unidade" class="form-control @error('unidade') is-invalid @enderror" required>
                                        @foreach($unidades as $unidade)
                                            <option value="{{$unidade->id}}" @if ($unidadeEspecifica->nome == $unidade->nome) selected @endif>{{$unidade->nome}}</option>
                                        @endforeach
                                    </select>
                                </label>
                                @error('unidade')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--BIBLIOTECARIO-->
                    @elseif($usuario->tipo == 'bibliotecario')

                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="matricula" class="row textoFicha px-3">Matrícula:
                                    <input id="matricula" type="matricula"
                                           class="form-control @error('matricula') is-invalid @enderror"
                                           name="matricula" value="{{ $usuarioEspecifico->matricula }}" required
                                           autocomplete="matricula" placeholder="matricula">
                                </label>
                                @error('matricula')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-12">
                                <label for="crb" class="row px-3 textoFicha">CRB:
                                    <input id="crb" type="matricula"
                                           class="form-control @error('matricula') is-invalid @enderror"
                                           name="crb" value="{{ $usuarioEspecifico->crb }}" required autocomplete="crb"
                                           placeholder="crb">
                                </label>
                                @error('crb')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                @endif
                <!-- Botões -->
                    <div class="form-group row justify-content-between mt-2">
                        <div class="col-sm-6">
                            <a style="background-color: var(--padrao); border-radius: 0.5rem; color: white; font-size: 17px" class="btn btn-secondary btn-cadastro-primary"
                               href="@can('isServidor', \App\Models\User::class){{  route('listar_alunos')}} @else {{  route('listar-usuario')}} @endcan">Voltar</a>
                        </div>
                        <div class="col-sm-6 text-right">
                            <button style="background-color: var(--confirmar); border-radius: 0.5rem; color: white; font-size: 17px" type="submit" class="btn lmts-primary btn-cadastro-primary">
                                {{ __('Salvar') }}
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">
                </form>
            </div>
        </div>
    </div>

    <script>
        $('#cpf').mask('000.000.000-00');
    </script>
@endsection


