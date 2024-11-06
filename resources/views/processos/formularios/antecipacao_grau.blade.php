
@extends('layouts.app')

@section('conteudo')

    <div class="container border rounded-3 shadow-lg">
        <form class="m-5" action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="antecipacao" id="tipo_processo" name="tipo_processo">

            <h1 class="pb-3">Antecipação de Colação de Grau</h1>
            <div class="form-group">
                <label for="semestre_conclusao" class="textoFicha">Semestre de Conclusão</label>
                <input class="form-control" type="text" id="semestre_conclusao" name="semestre_conclusao">
            </div>

            <div class="form-group">
                <label for="motivo" class="textoFicha">Motivo</label>
                <select class="form-control" name="motivo" id="motivo">
                    <option selected disabled>Selecione o Motivo</option>
                    <option value="Aprovado(a) em programa de Pós-Graduação">Aprovado(a) em programa de Pós-Graduação</option>
                    <option value="Emprego: empresa privada/ concursos públicos">Emprego: empresa privada/ concursos públicos</option>
                    <option value="Outros">Outros</option>
                </select>

                <div class="d-none" id="justificativaDiv">
                    <label for="justificativa" class="textoFicha">Justificativa</label>
                    <input class="form-control" type="text" name="justificativa" id="justificativa">
                </div>
            </div>

            <div class="form-group">
                <label for="doc_tratamento" class="textoFicha">Submeta o PDF</label>
                <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">
            </div>

            <button class="btn btn-success" type="submit">Enviar</button>
        </form>
    </div>

<script>
    document.getElementById("motivo").addEventListener("change", function(){
        if(this.value === "Outros"){
            document.getElementById("justificativaDiv").classList.remove("d-none");
        }else{
            document.getElementById("justificativaDiv").classList.add("d-none");
        }
    });
</script>
@endsection
