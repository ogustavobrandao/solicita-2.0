
@extends('layouts.app')

@section('conteudo')

    <div class="d-flex justify-content-center">
        <form action="{{route('processo.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="educacao_fisica" id="tipo_processo" name="tipo_processo">

            <div class="form-group">
                <label class="textoFicha" for="motivo">Motivo</label>
                <select class="form-control" name="motivo" id="motivo">
                    <option selected disabled>Selecione o Motivo</option>
                    <option value="Idade, a partir de 30 (trinta) anos">Idade, a partir de 30 (trinta) anos. (anexar a cópia autenticada da certidãodenascimento; ou casamento; ou RG);</option>
                    <option value="Deficiência física permanente">Deficiência física permanente. (anexar atestado médico, homologado peloDepartamento Médico da UFAPE);</option>
                    <option value="Prole, mulher ou homem de qualquer idade com filho">Prole, mulher ou homem de qualquer idade com filho. (anexar cópiaautenticada da Certidão de Nascimento do filho);</option>
                    <option value="Deficiência física temporária - dispensa parcial">Deficiência física temporária - dispensa parcial. (anexar atestado, homologado pelo Departamento Médico da UFAPE);</option>
                    <option value="Trabalho com jornada igual ou superior a 6 horas">Trabalho com jornada igual ou superior a 6 horas. (anexar declaraçãodaempresa onde trabalha, e requerer semestralmente, até a conclusão do curso, se trabalhar todo o prazo).</option>
                </select>
            </div>

            <div class="form-group">
                <label class="textoFicha" for="doc_tratamento">Submeta o pdf</label>
                <input class="form-control" type="file" name="doc_tratamento" id="doc_tratamento">
            </div>

            <div>
                <button class="btn btn-primary" type="submit"> Enviar</button>
            </div>
        </form>
    </div>
@endsection
