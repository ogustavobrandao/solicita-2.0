@extends('layouts.app')


@section('conteudo')

<div class="container-fluid background-blue" style="min-height:110vh">
  <div class="row justify-content-center">
    <div class="col-sm-3">
      <div class="card card-cadastro card-cadastro-servidor">
        <div class="card-body">

          <div class="row justify-content-center">
            <h2 style="margin-bottom: 10%;">Editar Usuário</h2>
          </div>
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
              <div class="row justify-content-center">
                  <div class="col-sm-12">
                      <label for="password" class="field a-field a-field_a3 page__field ">
                          <input id="password" type="text" class="form-control @error('password') is-invalid @enderror field__input a-field__input"
                                 name="password" value="*******" autocomplete="senha" placeholder="Senha">
                          <span class="a-field__label-wrap">
                              <span class="a-field__label">Alterar senha</span>
                          </span>
                      </label>
                      @error('password')
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
                        <span class="a-field__label">CPF</span>
                    </span>
                          </label>
                          @error('cpf')
                          <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                    </span>
                          @enderror
                      </div>
                  </div>
                  <H1>EU SOU ALUNO</H1>
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
                  </div>
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


@endsection
