@extends('layouts.app')

@section('conteudo')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 corpoRequisicao shadow">
                <div class="row mx-1 p-0" style="border-bottom: var(--textcolor) 2px solid">
                    <div class="col-md-12 tituoRequisicao mt-3 p-0">
                        Editar Perfil
                    </div>
                </div>

                <div class="col-md-12 p-0">
                    <form action="{{  route('atualizar-bibliotecario')  }}" method="POST">
                      <div class="col-sm-12">
                          <label for="name" class="field a-field a-field_a3 page__field ">
                              <input id="crb" type="text" class="form-control @error('crb') is-invalid @enderror field__input a-field__input"
                                     name="crb" value="{{ $bibliotecario->crb }}" required autocomplete="crb" autofocus placeholder="Digite o CRB">

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
                  </div>

                <div class="row justify-content-center">
                  <div class="col-sm-12">
                    <label for="email" class="field a-field a-field_a3 page__field ">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror field__input a-field__input"
                    name="email" value="{{ $user->email }}" required autocomplete="email" autofocus placeholder="E-Mail">

                    <span class="a-field__label-wrap">
                        <span class="a-field__label">E-mail</span>

                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-3">
                            <div class="col-sm-12">
                                <label for="email" class="row px-3 textoFicha">Email:
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ $user->email }}" required autocomplete="email"
                                           autofocus placeholder="E-Mail">
                                </label>
                                @error('email')
                                <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                    <strong>{{ $message }}</strong>
                    </span>
                                @enderror
                            </div>
                        </div>


                        <!-- Botões -->
                        <div class="form-group row mb-3">

                            <div class="col-md-6 " style="">
                                <a style="background-color: var(--padrao); border-radius: 0.5rem; color: white; font-size: 17px"
                                   class="btn" href="{{route('perfil-bibliotecario')}}">Voltar</a>
                            </div>

                            <div class="col-md-6 text-right">
                                <button
                                    style="background-color: var(--confirmar); border-radius: 0.5rem; color: white; font-size: 17px"
                                    type="submit" class="btn">
                                    {{ __('Salvar') }}
                                </button>
                            </div>


                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>




@endsection
