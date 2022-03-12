@extends('layouts.app')


@section('conteudo')
    <style>
        .backgroundGray {
            background-color: #f5f5f5;
            border: 0px;
        }

        label {
            font-weight: bold;
        }

        .tituloCadastro {
            border-bottom: black 2px solid;
            font-size: 40px;
            font-weight: bolder;
        }

        .btn-enviar {
            background-color: #4BC76C;
        }

        .btn-voltar {
            background-color: #0D2579;
        }
    </style>

    <div class="container-fluid py-5">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <div class="card card-cadastro card-cadastro-servidor px-3" style="border-radius: 0.5rem;">
                    <div class="card-body px-3">

                        <div class="row tituloCadastro">
                            Cadastrar Bibliotecário

                        </div>
                        <form action="{{  route('criar-bibliotecario')  }}" method="POST"
                              style=" margin-left: -13px; margin-right: -13px">
                            @csrf
                            <div class="row justify-content-center pt-3">
                                <div class="form-group col-sm-12">
                                    <label for="name">Nome</label>
                                    <input id="nomeServidor" type="name"
                                           class="form-control @error('name') is-invalid @enderror backgroundGray"
                                           name="name" value="{{ old('name') }}" required autocomplete="name"
                                           autofocus placeholder="Digite o Nome Completo">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <label id="email" for="email">
                                        E-mail
                                    </label>
                                    <input id="emailServidor" type="email"
                                           class="form-control @error('email') is-invalid @enderror backgroundGray"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus placeholder="E-Mail">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="form-group col-sm-12">
                                    <!-- Bibliotecas-->
                                    <label for="bibliotecas">Biblioteca</label>
                                    <select name="biblioteca" id="bibliotecas"
                                            class="form-control @error('email') is-invalid @enderror backgroundGray">

                                        <option value="" disable selected hidden>-- Selecionar biblioteca --</option>
                                        @foreach($bibliotecas as $biblioteca)
                                            <option value="{{$biblioteca->id}}">{{$biblioteca->nome}}</option>
                                        @endforeach

                                        @error('bibliotecas')
                                        <span class="invalid-feedback" role="alert"
                                              style="overflow: visible; display:block">
                                    <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-sm-6">
                                    <label for="name">
                                        Matrícula
                                    </label>
                                    <input id="matriculaServidor" type="number"
                                           class="form-control @error('matricula') is-invalid @enderror backgroundGray"
                                           name="matricula" value="{{ old('matricula') }}" required
                                           autocomplete="name" placeholder="Matricula">
                                    @error('matricula')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                                <div class="col-sm-6">
                                    <label for="name">
                                        CRB
                                    </label>
                                    <input id="crb" type="string"
                                           class="form-control @error('crb') is-invalid @enderror backgroundGray"
                                           name="crb" value="{{ old('crb') }}" required autocomplete="name"
                                           placeholder="CRB">
                                    @error('crb')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-sm-6">
                                    <label for="password">
                                        Senha
                                    </label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror backgroundGray"
                                           name="password" required autocomplete="current-password"
                                           placeholder="Senha">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block;">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>

                                <div class="col-sm-6">
                                    <label for="password-confirm">
                                        Confirmar Senha
                                    </label>
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password-confirm') is-invalid @enderror backgroundGray"
                                           name="password_confirmation" required autocomplete="new-password"
                                           placeholder="Confirmar Senha">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert"
                                          style="overflow: visible; display:block;">
                <strong>{{ $message }}</strong>
                </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="form-group row justify-content-center" style="margin-top:60px">
                                <div class="col-sm-3">
                                    <a class="btn btn-secondary btn-cadastro-primary btn-voltar"
                                       href="{{  route('home')}}">{{ __('Voltar') }}</a>
                                </div>
                                <div class="col-6"></div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn lmts-primary btn-cadastro-primary btn-enviar"
                                            onclick="confirmacaoCadastro();">
                                        {{ __('Salvar') }}
                                    </button>
                                </div>

                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection
