@extends('layouts.app')
@section('conteudo')
    <div class="container">
        <div class="row" style="border-bottom: var(--textcolor) 2px solid">
            <span class="titulo">Solicitações</span>

        </div>
    </div>

    <div class="container">
        <div>@include('componentes.mensagens')</div>
        <div class="row my-3 p-1 py-3 align-middle" style="background-color: #C2C2C2; border-radius: 1rem">
            <div class="col-md-12">
                <select name="cursos" id="cursos" autocomplete="off" onchange="quantidades()" class="browser-default custom-select custom-select col-md-12">
                    @foreach($cursos as $curso)
                        <option @if ($loop->first) selected @endif value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-between">
            @for($i = 1;$i <= 5; $i++)
                @if($i == 1)
                    <div class="caixaSelecao shadow text-center p-5 my-3" style="background-color: #3C498F">
                        <a id="click" href="{{ route('listar-requisicoes') }}"
                           onclick="event.preventDefault(); document.getElementById('listar-requisicoes{{$i}}-form').submit();"
                           style="text-decoration:none; color: inherit;">

                            <div class="card-body d-flex justify-content-center">
                                <span class="textoCaixa">{{$tipoDocumento[$i-1]}}</span>
                            </div>
                            <span class="textoCaixa2" id="quantidades{{$i}}"></span>
                        </a>
                    </div>
                @elseif($i == 2)
                    <div class="caixaSelecao shadow text-center p-5 my-3" style="background-color: #102AB8">
                        <a id="click" href="{{ route('listar-requisicoes') }}"
                           onclick="event.preventDefault(); document.getElementById('listar-requisicoes{{$i}}-form').submit();"
                           style="text-decoration:none; color: inherit;">

                            <div class="card-body d-flex justify-content-center">
                                <span class="textoCaixa">{{$tipoDocumento[$i-1]}}</span>
                            </div>
                            <span class="textoCaixa2" id="quantidades{{$i}}"></span>
                        </a>
                    </div>
                @elseif($i==3)
                    <div class="caixaSelecao shadow text-center p-5 my-3" style="background-color: #4D64DF">
                        <a id="click" href="{{ route('listar-requisicoes') }}"
                           onclick="event.preventDefault(); document.getElementById('listar-requisicoes{{$i}}-form').submit();"
                           style="text-decoration:none; color: inherit;">

                            <div class="card-body d-flex justify-content-center mt-3">
                                <span class="textoCaixa">{{$tipoDocumento[$i-1]}}</span>
                            </div>
                            <span class="textoCaixa2" id="quantidades{{$i}}"></span>
                        </a>
                    </div>
                @elseif($i==4)
                    <div class="caixaSelecao shadow text-center py-5 px-4 my-3" style="background-color: #102490">
                        <a id="click" href="{{ route('listar-requisicoes') }}"
                           onclick="event.preventDefault(); document.getElementById('listar-requisicoes{{$i}}-form').submit();"
                           style="text-decoration:none; color: inherit;">

                            <div class="card-body d-flex justify-content-center">
                                <span class="textoCaixa">{{$tipoDocumento[$i-1]}}</span>
                            </div>
                            <span class="textoCaixa2" id="quantidades{{$i}}"></span>
                        </a>
                    </div>
                @elseif($i==5)
                    <div class="caixaSelecao shadow text-center p-5 my-3" style="background-color: #121E5C">
                        <a id="click" href="{{ route('listar-requisicoes') }}"
                           onclick="event.preventDefault(); document.getElementById('listar-requisicoes{{$i}}-form').submit();"
                           style="text-decoration:none; color: inherit;">
                            <div class="card-body d-flex justify-content-center">
                                <span class="textoCaixa">{{$tipoDocumento[$i-1]}}</span>
                            </div>
                            <span class="textoCaixa2 pb-2" id="quantidades{{$i}}"></span>
                        </a>
                    </div>
                @endif
                <form id="listar-requisicoes{{$i}}-form" action="{{ route('listar-requisicoes') }}" method="GET"
                      style="display: none;">
                    <input type="hidden" name="curso_id" value="1">
                    <input type="hidden" name="titulo_id" value="{{$i}}">
                </form>
            @endfor
        </div>
    </div>

<script>
    function quantidades(){
      var curso = document.getElementById("cursos").value;
      var array = @json($requisicoes);

      var contagens = [0, 0, 0, 0, 0];
      let docsCurso = array.filter((item) => item.curso_id == curso);
      if (docsCurso) {
        docsCurso.forEach(element => {
            contagens[element['documento_id'] - 1] = element['total']
        });
      }

      document.getElementById('quantidades1').innerHTML = 'Nº de Requisições: ' + contagens[0];
      document.getElementById('quantidades2').innerHTML = 'Nº de Requisições: ' + contagens[1];
      document.getElementById('quantidades3').innerHTML = 'Nº de Requisições: ' + contagens[2];
      document.getElementById('quantidades4').innerHTML = 'Nº de Requisições: ' + contagens[3];
      document.getElementById('quantidades5').innerHTML = 'Nº de Requisições: ' + contagens[4];

      var cursoElements = document.querySelectorAll('input[name="curso_id"]');
      cursoElements.forEach(function(element) {
        element.value = curso;
      });
    }
    quantidades();

</script>
@endsection

