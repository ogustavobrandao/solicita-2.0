@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <div class="row justify-content-sm-center">
            <div class="col-md-11">
                <h2 class="tituloListagem">Requisições de Documentos</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table class="table table-borderless shadow table-hover mb-2"
                       style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="titleColumn" style="cursor:pointer">Autor</th>
                        <th scope="col" class="titleColumn text-center"
                            style="cursor:pointer">Tipo do Documento
                        </th>
                        <th scope="col" class="titleColumn text-center"
                            style="cursor:pointer">Data da Requisição
                        </th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Ação</th>
                        <th scope="col" class="text-center">Data de análise</th>
                    </tr>
                    </thead>
                    <tbody class="">
                    @foreach($requisicoesFichas as $requisicao)
                            @if($requisicao->ficha_catalografica_id != null)

                                @foreach($documentosFichaCatalografica as $documento)

                                    @if($documento->id == $requisicao->ficha_catalografica_id)

                                        <tr>
                                            <td class="align-middle text-center" scope="row">
                                                {{$requisicao->id}}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$documento->autor_nome}}
                                            </td>
                                            <td class="align-middle text-center">
                                                Ficha Catalografica -
                                                @if ($documento->tipo_documento_id == 2)Monografia
                                                @elseif ($documento->tipo_documento_id == 4)Tese
                                                @elseif ($documento->tipo_documento_id == 3)Produto Educacional
                                                @elseif ($documento->tipo_documento_id == 1)Dissertação
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ date('d/m/Y H:i:s', strtotime($documento->created_at)) }}
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status == 'Concluido')<p style="color: #1d643b; "><strong>Concluido</strong>
                                                </p>
                                                @elseif($requisicao->status == 'Em andamento')<p style="color: #857b26"><strong>Em
                                                        andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')<p style="color: #4c110f"><strong>Rejeitado</strong>
                                                </p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center btn-group">
                                                <?php
                                                $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                                ?>
                                                @if($requisicao->status == 'Em andamento')
                                                    @if($requisicao->bibliotecario_id != null && (date_diff($data_bibi, $data_agora)->h < 2))
                                                        <a class="btn" href="{{ route('editar-ficha', $requisicao->id) }}">
                                                            <img src="images/botao_editar_proibido.svg" height="30px" title="Botão de Editar - Alguém já está editando">
                                                            <a class="btn rounded-0" href="{{ route('visualizar-ficha', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                            </a>
                                                            @else
                                                                <a class="btn" href="{{ route('editar-ficha', $requisicao->id) }}">
                                                                    <img src="images/botao_editar.svg" height="30px" title="Botão de Editar - Edição permitida">
                                                                    <a class="btn" href="{{ route('visualizar-ficha', $requisicao->id) }}">
                                                                        <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                    </a>

                                                                    @endif
                                                                    @endif

                                                                    @if($requisicao->status == 'Concluido')
                                                                        <a class="btn" href="{{ route('visualizar-ficha', $requisicao->id) }}">
                                                                            <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                        </a>
                                                                    @endif
                                                                    @if($requisicao->status == 'Rejeitado')
                                                                        <a class="btn" data-toggle="modal"
                                                                           data-target="#exampleModal{{$requisicao->id}}">
                                                                            <img src="images/botao_info.svg" height="30px" title="Botão de Informação">
                                                                        </a>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal{{$requisicao->id}}"
                                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Status da
                                                                                            Analise</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        @if($requisicao->status == 'Concluido')
                                                                                            <p style="margin-left: 3px">Requisição analisada e
                                                                                                aprovada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                            </p>
                                                                                        @elseif($requisicao->status == 'Rejeitado' && $requisicao->bibliotecario_id != null)
                                                                                            <p style="margin: 1rem">Requisição analisada e
                                                                                                rejeitada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                                <br></p>
                                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                data-dismiss="modal">Close
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                    @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status != 'Em andamento')
                                                    {{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif

                                @endforeach


                            @elseif($requisicao->nada_consta_id != null)
                                @foreach($documentosNadaConsta as $documento)
                                    @if($requisicao->nada_consta_id == $documento->id)

                                        <tr>
                                            <td class="align-middle text-center" scope="row">
                                                {{$requisicao->id}}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$requisicao->aluno->user->name}}
                                            </td>
                                            <td class="align-middle text-center">
                                                Comprovante Nada Consta
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ date('d/m/Y H:i:s', strtotime($documento->created_at)) }}
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status == 'Concluido')<p style="color: #1d643b; "><strong>Concluido</strong>
                                                </p>
                                                @elseif($requisicao->status == 'Em andamento')<p style="color: #857b26"><strong>Em
                                                        andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')<p style="color: #4c110f"><strong>Rejeitado</strong>
                                                </p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center btn-group">
                                                <?php
                                                $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                                ?>
                                                @if($requisicao->status == 'Em andamento')
                                                    @if($requisicao->bibliotecario_id != null && (date_diff($data_bibi, $data_agora)->h < 2))
                                                        <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                            <img src="images/botao_editar_proibido.svg" height="30px" title="Botão de Editar - Alguém já está editando">
                                                            <a class="btn rounded-0" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                            </a>
                                                            @else
                                                                <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                                    <img src="images/botao_editar.svg" height="30px" title="Botão de Editar - Edição permitida">
                                                                    <a class="btn" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                        <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                    </a>

                                                                    @endif
                                                                    @endif

                                                                    @if($requisicao->status == 'Concluido')
                                                                        <a class="btn" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                            <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                        </a>
                                                                    @endif
                                                                    @if($requisicao->status == 'Rejeitado')
                                                                        <a class="btn" data-toggle="modal"
                                                                           data-target="#exampleModal{{$requisicao->id}}">
                                                                            <img src="images/botao_info.svg" height="30px" title="Botão de Informação">
                                                                        </a>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal{{$requisicao->id}}"
                                                                             role="dialog" aria-labelledby="exampleModalLabel"
                                                                             aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Status da
                                                                                            Analise</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        @if($requisicao->status == 'Concluido')
                                                                                            <p style="margin-left: 3px">Requisição analisada e
                                                                                                aprovada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                            </p>
                                                                                        @elseif($requisicao->status == 'Rejeitado' && $requisicao->bibliotecario_id != null)
                                                                                            <p style="margin: 1rem">Requisição analisada e
                                                                                                rejeitada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                                <br></p>
                                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                data-dismiss="modal">Close
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                    @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status != 'Em andamento')
                                                    {{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                            @elseif($requisicao->deposito_id != null)
                                @foreach($documentosDeposito as $documento)
                                    @if($requisicao->deposito_id == $documento->id)
                                        <tr>
                                            <td class="align-middle text-center" scope="row">
                                                {{$requisicao->id}}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$requisicao->aluno->user->name}}
                                            </td>
                                            <td class="align-middle text-center">
                                                Comprovante Deposito
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ date('d/m/Y H:i:s', strtotime($documento->created_at)) }}
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status == 'Concluido')<p style="color: #1d643b; "><strong>Concluido</strong>
                                                </p>
                                                @elseif($requisicao->status == 'Em andamento')<p style="color: #857b26"><strong>Em
                                                        andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')<p style="color: #4c110f"><strong>Rejeitado</strong>
                                                </p>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center btn-group">
                                                <?php
                                                $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                                ?>
                                                @if($requisicao->status == 'Em andamento')
                                                    @if($requisicao->bibliotecario_id != null && (date_diff($data_bibi, $data_agora)->h < 2))
                                                        <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                            <img src="images/botao_editar_proibido.svg" height="30px" title="Botão de Editar - Alguém já está editando">
                                                            <a class="btn rounded-0" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                            </a>
                                                            @else
                                                                <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                                    <img src="images/botao_editar.svg" height="30px" title="Botão de Editar - Edição permitida">
                                                                    <a class="btn" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                        <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                    </a>

                                                                    @endif
                                                                    @endif

                                                                    @if($requisicao->status == 'Concluido')
                                                                        <a class="btn" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                                            <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                                        </a>
                                                                    @endif
                                                                    @if($requisicao->status == 'Rejeitado')
                                                                        <a class="btn" data-toggle="modal"
                                                                        data-target="#exampleModal{{$requisicao->id}}">
                                                                            <img src="images/botao_info.svg" height="30px" title="Botão de Informação">
                                                                        </a>
                                                                        <!-- Modal -->
                                                                        <div class="modal fade" id="exampleModal{{$requisicao->id}}"
                                                                            role="dialog" aria-labelledby="exampleModalLabel"
                                                                            aria-hidden="true">
                                                                            <div class="modal-dialog" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title" id="exampleModalLabel">Status da
                                                                                            Analise</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal"
                                                                                                aria-label="Close">
                                                                                            <span aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">
                                                                                        @if($requisicao->status == 'Concluido')
                                                                                            <p style="margin-left: 3px">Requisição analisada e
                                                                                                aprovada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                            </p>
                                                                                        @elseif($requisicao->status == 'Rejeitado' && $requisicao->bibliotecario_id != null)
                                                                                            <p style="margin: 1rem">Requisição analisada e
                                                                                                rejeitada por:
                                                                                                <Strong>{{\App\Models\User::where('id',\App\Models\Bibliotecario::where('id',$requisicao->bibliotecario_id)->first()->user_id)->first()->name}}</Strong>
                                                                                                <br></p>
                                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                                            </p>
                                                                                        @endif
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-secondary"
                                                                                                data-dismiss="modal">Close
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                    @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status != 'Em andamento')
                                                    {{ date('d/m/Y H:i:s', strtotime($requisicao->updated_at)) }}
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endif

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
                "search": "",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próximo",
                }
            },
            "dom": '<"top"f>rt<"bottom"p><"clear">',
            "order": [],
            "columnDefs": [{
                "targets": [5],
                "orderable": false
            }]
        });

        $('.dataTables_filter').addClass('here');
        $('.dataTables_filter').addClass('');
        $('.here').addClass('center');
        $('.here').removeClass('dataTables_filter');
        $('.table-hover').removeClass('dataTable');
        $('.here').find('input').addClass('search-input');
        $('.here').find('input').addClass('align-middle');
        $('.here').find('label').contents().unwrap();
        $('.here').find('input').wrap('<div class="col-md-12 my-3 py-1" style="background-color: #C2C2C2; border-radius: 1rem;"> <div class="col-md-7 my-2"> <div class="col-md-12 p-1 img-search" style="background-color: white; border-radius: 0.5rem;"> </div> </div> </div>');
        $('.img-search').prepend('<img src="{{asset('images/search.png')}}" width="25px">');

    </script>
@endsection
