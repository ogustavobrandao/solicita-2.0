
@extends('layouts.app')

@section('conteudo')

    <div class="container border rounded-3 shadow-lg">
        <form class="m-5" action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="complementar" id="tipo_processo" name="tipo_processo">
            <h1 class="pb-3">Atividade Complementar</h1>

            <strong>
                <p>Acesse a <a target="_blank" href="http://www.ufape.edu.br/sites/default/files/arquivos/drca/Resoluc%CC%A7a%CC%83o%20CONSU-UFAPE%20n%C2%BA%20015_2020%20-%20Crite%CC%81rios%20para%20co%CC%82mputo%20de%20ACC.pdf">Resolução referente às Atividades Complementares de Curso (ACC).</a> <br>
                    Após isso, realize o upload de seus certificados correspondentes em um único arquivo PDF. </p>
            </strong>

            <div class="form-group">
                <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>

        </form>
    </div>
@endsection
