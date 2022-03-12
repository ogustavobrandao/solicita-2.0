@extends('layouts.app')
@section('conteudo')

@section('titulo','Home Aluno')

@section('navbar2.blade.php')
    Home
@endsection

<div class="container mt-5" style="border-bottom: var(--background) 3px solid;">
    <span style="color: var(--textcolor); font-size: 40px; font-family: 'Segoe UI'; font-weight: 700;">Solicitações</span>
</div>

<div class="container text-center">
    <div>@include('componentes.mensagens')</div>
    <div class="row justify-content-between mt-5">
        <div class="text-center p-5 shadow align-middle" style="background-color: var(--escolaridade); border-radius: 1rem; width: 250px;">
            <a href="{{ route("prepara-requisicao")}}">
                <div class="text-center pt-4">
                    <img class="pb-3" src="images/escolaridade-aluno.svg" height="120px">
                </div>
                <div class="text-center">
                    <div style="color: white; font-weight: 600; font-family: 'Segoe UI'; font-size: 23px">Escolaridade</div>
                </div>
            </a>
        </div>
        <div class="text-center p-5 shadow" style="background-color: var(--biblioteca); border-radius: 1rem; width: 250px;">
            <a href="{{ route("prepara-requisicao-bibli")}}">
                <div class="col-md-12 pt-4">
                    <div class="text-center">
                        <img class="pb-3" src="images/biblioteca-aluno.svg" height="120px">
                    </div>
                    <div class="text-center align-middle">
                        <div style="color: white; font-weight: 600; font-family: 'Segoe UI'; font-size: 23px">Biblioteca</div>
                    </div>
                </div>
            </a>
        </div>
        <div class="text-center p-5 shadow" style="background-color: var(--caixa); border-radius: 1rem; width: 250px;">
            <a href="{{ route("listar-requisicoes-aluno", ["titulo" => "Listar Documentos Solicitados"]) }}">
                <div class="text-center">
                    <img class="" src="images/vertical_split.svg" height="120px">
                </div>
                <div class="text-center">
                    <div style="color: var(--textcolor); font-weight: 600; font-family: 'Segoe UI'; font-size: 23px">Listagem de Documentos</div>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
