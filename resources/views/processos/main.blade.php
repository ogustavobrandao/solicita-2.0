
@extends('layouts.app')

@section('conteudo')

    <div class="color blue">
        <a class="btn btn-primary" href="{{route('disciplina.create')}}">Dispensa de disciplina</a>

        <a class="btn btn-primary" href="http://">Alteração cadastral</a>

        <a class="btn btn-primary" href="{{route('antecipacao_grau.create')}}">Antencipação de colocação de grau</a>

        <a class="btn btn-danger" href="{{route('complementar.create')}}">Atividade complementar</a>

        <a class="btn btn-primary" href="{{route('educacao.create')}}">Dispensa de educação fisica</a>

        <a class="btn btn-primary" href="{{route('excepcional.create')}}">Tratamemento excepcional</a>
    </div>
@endsection
