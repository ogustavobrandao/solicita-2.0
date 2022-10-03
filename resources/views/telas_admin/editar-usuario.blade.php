@extends('layouts.app')


@section('conteudo')

<div class="container-fluid background-blue" style="min-height:110vh">
  <div class="row justify-content-center">
    <div class="col-sm-3">
      <div class="card card-cadastro card-cadastro-servidor">
        <div class="card-body">

          <div class="row justify-content-center">
            <h2>Editando Usuário</h2>
          </div>
          @if ($usuario->tipo == "aluno")
            <div class="row justify-content-center">
                <h5>(perfil padrão do discente)</h5>
            </div>
          @endif
          <form action="{{  route('atualizar-usuario')  }}" method="POST">
            @csrf
            <div class="row justify-content-center">
              <div class="col-sm-12">
                <label for="nome" class="field a-field a-field_a3 page__field ">
                    <input id="nome" type="name" class="form-control @error('name') is-invalid @enderror field__input a-field__input"
                    name="name" value="{{ $usuario->name }}" required autocomplete="name" placeholder="Nome Completo">
                    <span class="a-field__label-wrap">
                        <span class="a-field__label"><strong>Nome</strong></span>
                    </span>
                </label>
                @error('name')
                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
              <br>
              <div class="row justify-content-center">
                  <div class="col-sm-12">
                      <label for="email" class="field a-field a-field_a3 page__field ">
                          <input id="email" type="email" class="form-control @error('email') is-invalid @enderror field__input a-field__input"
                                 name="email" value="{{ $usuario->email }}" required autocomplete="email" placeholder="E-Mail">

                          <span class="a-field__label-wrap">
                            <span class="a-field__label"><strong>E-mail</strong></span>
                          </span>
                      </label>
                      @error('email')
                      <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                      </span>
                      @enderror
                  </div>
              </div>
              <br>
              @if($usuario->tipo == 'aluno')
                 <div class="row justify-content-center">
                      <div class="col-sm-12">
                          <label for="email" class="field a-field a-field_a3 page__field ">
                              <input id="cpf" type="cpf" class="form-control @error('cpf') is-invalid @enderror field__input a-field__input"
                                     name="cpf" value="{{ $usuarioEspecifico->cpf }}" required autocomplete="cpf" placeholder="CPF">

                              <span class="a-field__label-wrap">
                        <span class="a-field__label"><strong>CPF</strong></span>
                    </span>
                          </label>
                          @error('cpf')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                    </span>
                          @enderror
                      </div>
                  </div><br>
                  <div class="row justify-content-center">
                        <div class="col-sm-12">
                          <label for="email" class="field a-field a-field_a3 page__field ">
                            <span class="a-field__label-wrap">
                                <span class="a-field__label"><strong>Curso</strong></span>
                            </span>
                            </label>
                            <select name="curso" id="curso" class="a-field__input browser-default custom-select px-3 @error('curso') is-invalid @enderror field__input a-field__input" required>
                                @foreach($cursos as $curso)
                                    <option value="{{$curso->id}}" @if ($perfil->curso_id== $curso->id) selected @endif>{{$curso->nome}}</option>
                                @endforeach
                            </select>
                            <span class="linha mt-1"></span>
                          @error('curso')
                            <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                      </div>
                  </div><br>
                  <div class="row justify-content-center">
                      <div class="col-sm-12">
                          <label for="situacao" class="field a-field a-field_a3 page__field ">
                              <span class="a-field__label-wrap">
                                <span class="a-field__label"><strong>Situação</strong></span>
                             </span>
                          </label>
                          <select name="situacao" id="situacao" class="a-field__input browser-default custom-select px-3 @error('situacao') is-invalid @enderror" required>
                            @foreach($situacoes as $situacao)
                                <option value="{{$situacao}}" @if ($perfil->situacao == $situacao) selected @endif>{{$situacao}}</option>
                            @endforeach
                          </select>
                          <span class="linha mt-1"></span>
                          @error('situacao')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div><br>
                  <div class="row justify-content-center">
                      <div class="col-sm-12">
                          <label for="unidade" class="field a-field a-field_a3 page__field ">
                              <span class="a-field__label-wrap">
                                <span class="a-field__label"><strong>Unidade</strong></span>
                             </span>
                          </label>
                          <select name="unidade" id="unidade" class="a-field__input browser-default custom-select px-3 @error('unidade') is-invalid @enderror" required>
                                @foreach($unidades as $unidade)
                                    <option value="{{$unidade->id}}" @if ($unidadeEspecifica->nome == $unidade->nome) selected @endif>{{$unidade->nome}}</option>
                                @endforeach
                          </select>
                          <span class="linha mt-1"></span>
                          @error('unidade')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div>
              @elseif($usuario->tipo == 'bibliotecario')
                  <div class="row justify-content-center">
                      <div class="col-sm-12">
                          <label for="email" class="field a-field a-field_a3 page__field ">
                              <input id="matricula" type="matricula" class="form-control @error('matricula') is-invalid @enderror field__input a-field__input"
                                     name="matricula" value="{{ $usuarioEspecifico->matricula }}" required autocomplete="matricula" placeholder="matricula">

                              <span class="a-field__label-wrap">
                                 <span class="a-field__label">Matricula</span>
                              </span>
                          </label>
                          @error('matricula')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div><br>
                  <div class="row justify-content-center">
                      <div class="col-sm-12">
                          <label for="crb" class="field a-field a-field_a3 page__field ">
                              <input id="crb" type="matricula" class="form-control @error('matricula') is-invalid @enderror field__input a-field__input"
                                     name="crb" value="{{ $usuarioEspecifico->crb }}" required autocomplete="crb" placeholder="crb">

                              <span class="a-field__label-wrap">
                                 <span class="a-field__label">CRB</span>
                              </span>
                          </label>
                          @error('crb')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                            <strong>{{ $message }}</strong>
                          </span>
                          @enderror
                      </div>
                  </div><br>
                  <h1>EU SOU BIBLIOTECARIO</h1>
              @endif
              <!-- Botões -->
            <div class="form-group row justify-content-center" style="margin-top:60px">
                <div class="col-sm-6">
                <a class="btn btn-secondary btn-cadastro-primary" href="{{  route('listar-usuario')}}" >Voltar</a>
                </div>

                <div class="col-sm-6">
                    <button type="submit" class="btn lmts-primary btn-cadastro-primary">
                        {{ __('Alterar') }}
                    </button>
                </div>

            </div>

              <input type="hidden" name="id_usuario" value="{{ $usuario->id }}">

          </form>
        </div>
      </div>

    </div>
  </div>
</div>
<script>
    $('#cpf').mask('000.000.000-00');
</script>

@endsection
