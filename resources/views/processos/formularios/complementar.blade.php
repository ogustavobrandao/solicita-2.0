
@extends('layouts.app')

@section('conteudo')

    <div class="color blue">
        <form action="{{route('tratamento.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            

            <label for="">submeta o pdf</label>
            <input type="file" name="doc_tratamento" id="doc_tratamento">

            <a href="{{route('tratamento.store')}}"> <button type="submit"> Enviar</button></a>
        </form>
    </div>
@endsection
