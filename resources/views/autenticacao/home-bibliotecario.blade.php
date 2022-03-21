@extends('layouts.app')
@section('conteudo')

@section('titulo','Home Bibliotecario')

@section('navbar2.blade.php')
    Home
@endsection
<div class="container">


    <div class="row justify-content-center">
        <div class="text-center p-5 shadow caixaSelecao" style="background-color: var(--biblioteca)">
            <a href="{{ route('listar-fichas') }}">
                <div class="col-md-12 ">
                    <div class="text-center">
                        <i style="color: white" class="pb-3 fa-solid fa-list-check fa-8x"></i>
                    </div>
                    <div class="text-center align-middle">
                        <div class="textoCaixa">Documentos Solicitados</div>
                    </div>
                </div>
            </a>
        </div>
    </div>

</div>
@endsection
