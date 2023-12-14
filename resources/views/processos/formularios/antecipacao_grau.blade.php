
@extends('layouts.app')

@section('conteudo')

    <div class="color blue">
        <form action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" value="antecipacao" id="tipo_processo" name="tipo_processo">
            <label for="">Semestre de conclusão</label>
            <input type="text" id="semestre_conclusao" name="semestre_conclusao">
            <label for="">Motivo</label>
            <select name="motivo" id="motivo">
                <option value="Aprovado(a) em programa de Pós-Graduação">Aprovado(a) em programa de Pós-Graduação</option>
                <option value="Emprego: empresa privada/ concursos públicos">Emprego: empresa privada/ concursos públicos</option>
                
            </select>

            <label for="">Submeta o pdf</label>
            <input type="file" name="doc_tratamento" id="doc_tratamento">

            <button type="submit">Enviar</button>
        </form>
    </div>
@endsection
