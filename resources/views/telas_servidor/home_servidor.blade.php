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
                <select name="cursos" id="cursos" onchange="getSelectValue();" class="browser-default custom-select custom-select col-md-12">
                    @foreach($cursos as $curso)
                        <option id="optionComOValor" value="{{$curso->id}}" onclick="quantidades({{$curso->id}})">{{$curso->nome}}</option>
                    @endforeach
                </select>
                <script>
                    function getSelectValue(){
                        var selectedValue = document.getElementById("cursos").value;
                        document.getElementById('cursoIdDeclaracao1').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao2').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao3').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao4').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao5').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao6').value = selectedValue;
                        document.getElementById('cursoIdDeclaracao7').value = selectedValue;

                    }
                </script>
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
                    <input id="cursoIdDeclaracao{{$i}}" type="hidden" name="curso_id" value="1">
                    <input type="hidden" name="titulo_id" value="{{$i}}">
                </form>
            @endfor
        </div>
    </div>

<script>
    function quantidades(curso){ //id do curso
      var selectedValue = document.getElementById("cursos").value;
      var selecionado = selectedValue;
      var array = @json($requisicoes);

      var aux, i;
      tamanho = array.length;
      // document.reload();
      var vinculo = 0, matricula = 0, historico = 0 , programa = 0, outros = 0,indeferidos = 0 ,concluidos = 0;

      for(i = 0; i < tamanho; i++){
        //console.log(array[i].perfils[0].id)

        if(array[i].status == "Em andamento" && array[i].documento_id == 1 &&  array[i].curso == selecionado){
          vinculo++;
        }
        if(array[i].status == "Em andamento" && array[i].documento_id == 2 && array[i].curso == selecionado){
          matricula++;
        }
        if(array[i].status == "Em andamento" && array[i].documento_id == 3 && array[i].curso == selecionado){
          historico++;
        }
        if(array[i].status == "Em andamento" && array[i].documento_id == 4 && array[i].curso == selecionado){
          programa++;
        }
        if(array[i].status == "Em andamento" && array[i].documento_id == 5 && array[i].curso == selecionado){
          outros++;
        }
        if(array[i].status == "Concluído - Disponível para retirada" &&  array[i].curso == selecionado){
          concluidos++;
        }
        if(array[i].status == "Indeferido" &&  array[i].curso == selecionado){
          indeferidos++;
        }

      }
      document.getElementById('quantidades1').innerHTML = 'Nº de Requisições: ' + vinculo;
      document.getElementById('quantidades2').innerHTML = 'Nº de Requisições: ' + matricula;
      document.getElementById('quantidades3').innerHTML = 'Nº de Requisições: ' + historico;
      document.getElementById('quantidades4').innerHTML = 'Nº de Requisições: ' + programa;
      document.getElementById('quantidades5').innerHTML = 'Nº de Requisições: ' + outros;
    }

    quantidades(document.getElementById('optionComOValor').value);

    $('#cursos').on('change', function() {
      quantidades(document.getElementById('optionComOValor').value);
    })


    $(function(){
      getSelectValue();
      quantidades(document.getElementById('optionComOValor').value);
    })

</script>
@endsection

