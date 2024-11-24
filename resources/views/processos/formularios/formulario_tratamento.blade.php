@extends('layouts.app')

@section('conteudo')

    <div class="container border rounded-3 shadow-lg">
        <form class="m-5" action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="excepcional" id="tipo_processo" name="tipo_processo">
            <h1 class="pb-3">Tratamento Excepcional de Faltas</h1>

            <div class="form-check">
                <label for="" class="form-check-label"><input type="radio" class="form-check-input">Lei nº 13.796/19 – Motivação religiosa (anexar declaração do líder religioso da igreja que frequenta atestando que é integrante daquela religião e enumerando os dias que deve guardar);                </label>
                <label for="" class="form-check-label"><input type="radio" class="form-check-input">Lei nº 1.044/69 – Incapacidade Física (anexar atestado médico devidamente assinado e carimbado);</label>
                <label for="" class="form-check-label"><input type="radio" class="form-check-input">Lei nº 6.202/75 – Estudante em Estado de Gestação (anexar laudo médico devidamente assinado e carimbado);</label>
                <label for="" class="form-check-label"><input type="radio" class="form-check-input">Lei nº 549/69 – Militar por Força no Exército de Manobras (anexar documentação comprobatória);</label>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nome da disciplina</th>
                        <th>Nome do professor resonsável pela disciplina</th>
                    </tr>

                </thead>
                <tbody>
                    <tr>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                    </tr>
                    <tr>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                    </tr>
                    <tr>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                    </tr>
                    <tr>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                    </tr>
                    <tr>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                        <td class="p-0"><input type="text" class="form-control m-0 border-0"></td>
                    </tr>
                </tbody>
            </table>

            <div class="form-group row">
                <div class="col-md-4">
                    <label class="textoFicha" for="doc_tratamento">Data inicial</label>
                    <input class="form-control" type="date" name="doc_tratamento" id="doc_tratamento">
                </div>
                <div class="col-md-4">
                    <label class="textoFicha" for="doc_tratamento">Data final</label>
                    <input class="form-control" type="date" name="doc_tratamento" id="doc_tratamento">
                </div>
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
    </div>
@endsection
