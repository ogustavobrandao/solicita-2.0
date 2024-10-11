
@extends('layouts.app')

@section('conteudo')

    <div class="d-flex justify-content-center">
        <form action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="disciplina" id="tipo_processo" name="tipo_processo">

            <label class="textoFicha" for="">Nome do Curso Antigo</label>
            <input class="form-control" type="text" id="curso_anterior" name="curso_anterior">

            <label class="textoFicha" for="">Semetre de Entrada da UFAPE</label>
            <input class="form-control" type="text" name="semestre_entrada" id="semestre_entrada">

            <label class="textoFicha" for="">Submeta o PDF</label>
            <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">

            <div>
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </form>
    </div>
@endsection
