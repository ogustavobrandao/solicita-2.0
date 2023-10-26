
@extends('layouts.app')

@section('conteudo')

    <div class="color blue">
        <form action="{{route('tratamento.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">Nome do Curso Antigo</label>
            <input type="text" id="curso_anterior" name="curso_anterior">

            <label for="">Semetre de Entrada da UFAPE</label>
            <input type="text" name="semestre_entrada" id="semestre_entrada">

            <label for="">Submeta o PDF</label>
            <input type="file" name="doc_tratamento" id="doc_tratamento">

            <div>
                <a href="{{route('tratamento.store')}}"> <button type="submit"> Enviar</button></a>
            </div>
        </form>
    </div>
@endsection
