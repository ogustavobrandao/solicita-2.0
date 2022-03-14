@extends('layouts.app')

@section('conteudo')
    <!-- @section('navbar2.blade.php')
    Home
@endsection -->
<div class="container">
    <div class="col-md-12">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="col-md-12 corpoFicha shadow my-4">
                    <div class="row">
                        <div class="col-md-12 cabecalho-requisicao py-2">
                            <span class="tituloFicha">Biblioteca</span>
                        </div>
                        <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                        action="{{ route('cadastrarDocumento') }}">
                            @csrf
                            <div class="row ">
                                <div class="col-md-12">
                                    <div class="py-3 col-md-12">
                                        <label class="textoFicha">Aluno(a):</label>
                                        <input class="form-control" type="text" name="nome" size="100%" disabled value="{{Auth::user()->name}}">
                                    </div>
                                    <div class="py-3 col-md-12">
                                        <label class="textoFicha">Perfil:</label>
                                        <select name="default" class="form-control" style="background-color: var(--background)">
                                            @foreach($perfis as $perfil)
                                                <option @if($perfil->valor==true) selected
                                                        @endif value="{{$perfil->id}}">{{$perfil->default}}
                                                    - {{$perfil->situacao}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="py-3 col-md-12">
                                        <label class="textoFicha">Tipo de Documento:</label>
                                        @foreach($tipos_documentos as $tipo)
                                            <div>
                                                <input type="radio" name="documento" value="{{$tipo->id}}"
                                                       id="{{$tipo->tipo}}" @if($tipo->tipo == 'Monografia') checked @endif>
                                                @if($tipo->tipo == 'Monografia')Monografia
                                                @elseif($tipo->tipo == 'Tese')Tese
                                                @elseif($tipo->tipo == 'TCC')Trabalho de Conclusão de Curso
                                                @elseif($tipo->tipo == 'ProgramaEduc')Produto Educacional
                                                @elseif($tipo->tipo == 'Dissertacao')Dissertação
                                                @else {{$tipo->tipo}}
                                                @endif</input>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                                <div class="row justify-content-between m-5">
                                    <div class="col-md-6">
                                        <a class="btn btn-block" href="{{ route('cancela-requisicao')}}" style="background-color: var(--padrao); border-radius: 0.5rem; color: white;">
                                            {{ ('Cancelar') }}
                                        </a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <button type="submit" class="btn btn-block"
                                                style="background-color: var(--confirmar); border-radius: 0.5rem; color: white;">
                                            {{ ('Solicitar') }}
                                        </button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
>
@endsection
