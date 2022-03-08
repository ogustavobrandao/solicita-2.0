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
        {{-- <div class="row justify-content-sm-center " style="">
            <select class="form-select" aria-label="" style="">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
            </select>
        </div>--}}
        <div style="margin-bottom: 15px; margin-top: 15px;" class="row justify-content-sm-center">
            <div class="col-sm-10">
                <h2 class="tituloTabela">{{Auth::user()->name}} - Lista de Requisições de Fichas Catalográficas</h2>
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
                        <th scope="col" align="center">Data de análise</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requisicoesFichas as $requisicao)
                        @foreach($fichas as $ficha)
                            @if($ficha->id == $requisicao->ficha_catalografica_id)
                                <tr style="background-color: #f9f9f9">
                                    <td scope="row">
                                        {{$requisicao->id}}
                                    </td>
                                    <td>
                                        {{$ficha->autor_nome}}
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
                                        {{ date('d/m/Y H:i:s', strtotime($ficha->created_at)) }}
                                    </td>
                                    <td>
                                        @if($requisicao->status == 'Concluido')<p style="color: #1d643b; "><strong>Concluido</strong></p>
                                        @elseif($requisicao->status == 'Em andamento')<p style="color: #857b26"><strong>Em andamento</strong></p>
                                        @elseif($requisicao->status == 'Rejeitado')<p style="color: #4c110f"><strong>Rejeitado</strong></p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('editar-ficha', $requisicao->id) }}"><i class="fa fa-file-text fa-sm" aria-hidden="true" size="10px"></i> Abrir</a>
                                        @if($requisicao->status != 'Em andamento')
                                            <div class="btn-group-vertical">
                                                <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                                    <span class="fa fa-info-circle" title="Exibir explicação da rejeição"></span>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    @if($requisicao->status == 'Concluido')

                                                        <p style="margin-left: 3px">Requisição analisada e aprovada por: <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong></p>
                                                    @elseif($requisicao->status == 'Rejeitado' && $requisicao->bibliotecario_id != null)
                                                        <p style="margin: 1rem">Requisição analisada e rejeitada por: <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong> <br></p>
                                                        <p style="margin-left: 1rem">Motivo: <strong style="color: #4c110f">{{ $requisicao->anotacoes }}</strong></p>
                                                    @endif
                                                </ul>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        @if($requisicao->status != 'Em andamento')
                                            {{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $('#table').DataTable({
            searching: true,
            
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Exibindo página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "zeroRecords": "Nenhum registro disponível",
                "search": "Pesquisar",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                }
            },
            "order": [],
            "columnDefs": [{
                "targets": [5],
                "orderable": false
            }]
        });
    </script>
@endsection
