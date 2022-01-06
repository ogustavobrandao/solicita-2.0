@extends('layouts.app')

@section('conteudo')
    <!-- @section('navbar')
    Home
@endsection -->
<div class="container" style="min-height:80vh">

    <div class="row justify-content-center">
        <div class="col-sm-8">
            <div class="card card-cadastro">
                <div class="card-body">

                    <div class="row justify-content-center">
                        <h2>Solicitar Ficha Catalográfica</h2>
                    </div>
                    <form method="POST" enctype="multipart/form-data" id="formRequisicao"
                          action="{{ route('cadastrarDocumento') }}">
                        @csrf

                        <div class="form-group row justify-content-center">
                            <div class="col-sm-12">

                                <label>Aluno</label>
                                <h4>&nbsp{{Auth::user()->name}}</h4>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <div class="col-sm-12">
                                <label>Perfil</label>
                                <select name="default" class="custom-select custom-select-lg " style="font-size: 90%">
                                @foreach($perfis as $perfil)
                                    <!-- <label for='perfil' style="width: 14.5rem; margin-left:25px"><b>Curso</b></label> -->
                                        <option @if($perfil->valor==true) selected
                                                @endif value="{{$perfil->id}}">{{$perfil->default}}
                                            - {{$perfil->situacao}}</option></br>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-sm-12">
                                <label>Tipo de Ficha</label>

                                @foreach($tipos_documentos as $tipo)
                                    <div>
                                        <input type="radio" name="documento" value="{{$tipo->id}}"
                                               id="{{$tipo->tipo}}" @if($tipo->tipo == 'Monografia') checked @endif>
                                        @if($tipo->tipo == 'Monografia')Monografia
                                        @elseif($tipo->tipo == 'Tese')Tese
                                        @elseif($tipo->tipo == 'TCC')Trabalho de Conclusão de Curso
                                        @elseif($tipo->tipo == 'ProgramaEduc')Produto Educacional
                                        @else {{$tipo->tipo}}
                                        @endif</input>
                                    </div>
                                @endforeach
                                <div class="form-group row mb-0" style="margin-top:10px">
                                    <div class="col-md-8 offset-md-4">

                                        <a class="btn btn-secondary" href="{{ route('cancela-requisicao')}}"
                                           style="margin-right:10px">
                                            {{ ('Cancelar') }}
                                        </a>

                                        <button type="submit" class="btn btn-primary-lmts"
                                                style="margin-right:10px">
                                            {{ ('Solicitar') }}
                                        </button>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

</div>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"
>
@endsection
