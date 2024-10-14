
@extends('layouts.app')

@section('conteudo')

    <div class="container border rounded-3 shadow-lg">
        <form class="m-5" action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="disciplina" id="tipo_processo" name="tipo_processo">

            <h1 class="pb-3">Dispensa de Disciplina</h1>
            <div class="form-group">
                <label class="textoFicha" for="">Nome do Curso Antigo</label>
                <input class="form-control" type="text" id="curso_anterior" name="curso_anterior">
            </div>

            <div class="form-group">
                <label class="textoFicha" for="">Semetre de Entrada da UFAPE</label>
                <input class="form-control" type="text" name="semestre_entrada" id="semestre_entrada">
            </div>

            <div class="form-group">
                <label class="textoFicha" for="">Submeta o PDF</label>
                <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">
            </div>

            <div>
                <button class="btn btn-success" type="submit">Enviar</button>
            </div>
        </form>
    </div>
@endsection
