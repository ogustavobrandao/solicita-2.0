
@extends('layouts.app')

@section('conteudo')

    <div class="color blue">
        <form action="{{route('tratamento.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="">nome do professor</label>
            <input type="text" name="doc_tratamento" id="doc_tratamento">

            <label for="">nome do professor</label>
            <input type="text" name="doc_tratamento" id="doc_tratamento">

            <label for="">nome do professor</label>
            <input type="text" name="doc_tratamento" id="doc_tratamento">

            <label for="">submeta o pdf</label>
            <input type="file" name="doc_tratamento" id="doc_tratamento">

            <a href="http://"> <button type="submit"> Enviar</button></a>
        </form>
    </div>
@endsection
