
@extends('layouts.app')

@section('conteudo')

    <div class="d-flex justify-content-center">
        <form action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="excepcional" id="tipo_processo" name="tipo_processo">

            <div class="form-group">
                <label class="textoFicha" for="requerimento">Submeta o Requerimento: </label>
                <input class="form-control" type="file" name="requerimento" id="requerimento">
            </div>

            <div class="form-group">
                <label class="textoFicha" for="doc_tratamento">Submeta o pdf com</label>
                <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
    </div>
@endsection
