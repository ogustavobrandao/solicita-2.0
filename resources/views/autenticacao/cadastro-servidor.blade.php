@extends('layouts.app')


@section('conteudo')

    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-md-7 corpoRequisicao shadow" pb-3>
                <div class="row mx-1 p-0" style="border-bottom: var(--textcolor) 2px solid">
                    <div class="col-md-12 tituoRequisicao mt-3 p-0">
                        Cadastro de Servidor
                    </div>
                </div>
                <div class="row py-3">
                    <div class="col-md-12">
                        <form action="{{  route('confirmacao-servidor')  }}" method="POST">
                            @csrf
                            <div class="row justify-content-center py-2 mt-2">
                                <div class="col-md-12">
                                    <label class="textoFicha" for="name">Nome:</label>
                                    <input id="nomeServidor" type="name"
                                           class="form-control @error('name') is-invalid @enderror backgroundGray"
                                           name="name" value="{{ old('name') }}" required autocomplete="name"
                                           autofocus placeholder="Digite o Nome Completo">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-between py-2">
                                <div class="col-md-6">
                                    <label class="textoFicha" for="matriculaServidor">Matricula:</label>
                                    <input id="matriculaServidor" type="number"
                                           class="form-control @error('matricula') is-invalid @enderror backgroundGray"
                                           name="matricula" value="{{ old('matricula') }}" required autocomplete="name"
                                           autofocus placeholder="Digite a Matricula do Servidor">
                                    @error('matricula')
                                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="textoFicha" for="emailServidor">E-mail:</label>
                                    <input id="emailServidor" type="email"
                                           class="form-control @error('email') is-invalid @enderror backgroundGray"
                                           name="email" value="{{ old('email') }}" required autocomplete="email"
                                           autofocus placeholder="Digite o Email do Servidor">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row justify-content-between py-2">

                                <div class="col-md-6">
                                    <label class="textoFicha" for="password">Senha:</label>
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror backgroundGray"
                                           name="password" required autocomplete="current-password"
                                           autofocus placeholder="Digite a Senha do Servidor">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label class="textoFicha" for="password-confirm">Confirmação de Senha:</label>
                                    <input id="password-confirm" type="password"
                                           class="form-control @error('password-confirm') is-invalid @enderror backgroundGray"
                                           name="password_confirmation" required autocomplete="new-password"
                                           autofocus placeholder="Confirme a Senha do Servidor">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert" style="overflow: visible; display:block;">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Botões -->
                            <div class="row justify-content-between py-2">
                                <div class="col-md-6">
                                    <a style="background-color: var(--padrao); border-radius: 0.5rem; color: white; font-size: 17px" class="btn btn-cadastro-primary" href="{{  route('home')}}" >Voltar</a>
                                </div>

                                <div class="col-md-6 text-right">
                                    <button style="background-color: var(--confirmar); border-radius: 0.5rem; color: white; font-size: 17px" type="submit" class="btn" href="{{  route('confirmacao-servidor')}}"
                                            onclick="confirmacaoCadastro();">
                                        {{ __('Cadastrar') }}
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
