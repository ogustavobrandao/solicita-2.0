@extends('layouts.app')

@section('conteudo')
    <div>@include('componentes.mensagens')</div>
    <div class="container-fluid" style="min-height:38vh">

        {{-- <div class="row jusify-content-center d-flex justify-content-center">
          <div class="col-sm-10">
            <div class="alert alert-danger" role="alert">
              <h3 align="center">Atenção</h3>
            <h4 align="center">A entrega dos documentos solicitados está condicionada a apresentação de <b>Documento Oficial com foto</b>!</h4>
            </div>
          </div>
        </div>
       --}}
        <div class="row justify-content-sm-center">
            <div class="col-sm-10">
                <h2 class="tituloTabela">{{Auth::user()->name}} - Lista de Fichas Catalograficas</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <table class="table table-responsive-lg table-borderless" id="table">
                    <thead class="lmts-primary" style="border-color:#1B2E4F;">
                    <tr>
                        <th scope="col" align="center">#</th>
                        <th scope="col" align="center" class="titleColumn"
                            style="cursor:pointer">Autor
                        </th>
                        <th scope="col" align="center" class="titleColumn"
                            style="cursor:pointer">Tipo do Documento</th>
                        <th scope="col" align="center" class="titleColumn"
                            style="cursor:pointer">Data da Requisição</th>
                        <th scope="col" align="center">Status</th>
                        <th scope="col" align="center">Ação</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fichas as $ficha)
                        <tr style="background-color: #f9f9f9">
                            <td scope="row">
                                {{$ficha->id}}
                            </td>
                            <td>
                                {{$ficha->autor}}
                            </td>
                            <td>
                                @if ($ficha->tipo_documento_id == 1)Monografia
                                @elseif ($ficha->tipo_documento_id == 2)Tese
                                @elseif ($ficha->tipo_documento_id == 3)TCC
                                @elseif ($ficha->tipo_documento_id == 4)Produto Educacional
                                @elseif ($ficha->tipo_documento_id == 5)Dissertação
                                @endif
                            </td>
                            <td>
                                {{$ficha->created_at}}
                            </td>
                            <td>
                                Em Andamento
                            </td>
                            <td>
                                <a href="{{ route('editar-fichas') }}"><i class="fa fa-file-text fa-sm" aria-hidden="true" size="10px"></i> Abrir</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
@endsection
