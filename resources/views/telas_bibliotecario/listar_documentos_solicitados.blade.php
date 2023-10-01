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
                        <th scope="col" class="border-bottom-0 py-3">#</th>
                        <th scope="col" class="titleColumn border-bottom-0 py-3" style="cursor:pointer">Autor</th>
                        <th scope="col" class="titleColumn text-center border-bottom-0 py-3"
                            style="cursor:pointer">Tipo do Documento
                        </th>
                        <th scope="col" class="titleColumn text-center border-bottom-0 py-3"
                            style="cursor:pointer">Data da Requisição
                        </th>
                        <th scope="col" class="text-center border-bottom-0 py-3">Status</th>
                        <th scope="col" class="text-center border-bottom-0 py-3">Ação</th>
                        <th scope="col" class="text-center border-bottom-0 py-3">Data de análise</th>
                    </tr>
                    </thead>
                    <tbody class="">
                        @php
                            $count = 1;
                        @endphp
                        @foreach($requisicoesFichas as $requisicao)
                            @if($requisicao->ficha_catalografica_id != null)
                                @foreach($documentosFichaCatalografica as $documento)
                                    @if($documento->id == $requisicao->ficha_catalografica_id)
                                        <tr>
                                            <td class="align-middle text-center" scope="row">
                                                {{$count++}}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$documento->autor_nome}}
                                            </td>
                                            <td class="align-middle text-center">
                                                Ficha Catalográfica -
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
                                                @if($requisicao->status == 'Concluido')
                                                    <p class="mb-0" style="color: #1d643b; "><strong>Concluído</strong></p>
                                                @elseif($requisicao->status == 'Em andamento')
                                                    <p class="mb-0" style="color: #857b26"><strong>Em andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')
                                                    <p class="mb-0" style="color: #4c110f"><strong>Rejeitado</strong></p>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    <?php
                                                    // $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                    // $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));&& (date_diff($data_bibi, $data_agora)->h < 2)
                                                    ?>
                                                    @if($requisicao->status == 'Em andamento')
                                                        @if($requisicao->bibliotecario_id != null && $requisicao->bibliotecario_id != $bibliotecario->id)
                                                            <a class="btn btn-modal" href="#" data-toggle="modal" data-target="#modalEditarFicha">
                                                                <img src="images/botao_editar_proibido.svg" height="30px" title="Botão de Editar - Alguém já está editando">
                                                            </a>                                                    
                                                            <a class="btn rounded-0" href="{{ route('visualizar-ficha', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Botão de Visualizar Ficha">
                                                            </a>
                                                                                                                                                                            <!-- Modal de Edição precisa ficar aqui por conta do foreach, na possibilidade de nao haver nada ele da problema na $requisicao -->
                                                                <div class="modal fade" id="modalEditarFicha" tabindex="-1" role="dialog" aria-labelledby="modalEditarFichaLabel">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="modalEditarFichaLabel">Edição de Ficha</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                Alguém já está editando esta ficha. O que você deseja fazer?
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <a href="{{ route('editar-ficha', $requisicao->id) }}" class="btn btn-primary">Editar</a>
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        @else
                                                            <a class="btn" href="{{ route('editar-ficha', $requisicao->id) }}">
                                                                <img src="images/botao_editar.svg" height="30px" title="Botão de Editar - Edição permitida">
                                                            </a>
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
                                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                                            Status da Análise
                                                                        </h5>
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
                                                                                <br>
                                                                            </p>
                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Fechar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
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
                                                {{$count++}}
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
                                                @if($requisicao->status == 'Concluido')
                                                    <p class="mb-0" style="color: #1d643b; "><strong>Concluído</strong></p>
                                                @elseif($requisicao->status == 'Em andamento')
                                                    <p class="mb-0" style="color: #857b26"><strong>Em andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')
                                                    <p class="mb-0" style="color: #4c110f"><strong>Rejeitado</strong></p>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    <?php
                                                    $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                    $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                                    ?>
                                                    @if($requisicao->status == 'Em andamento')
                                                        @if($requisicao->bibliotecario_id != null && (date_diff($data_bibi, $data_agora)->h < 2))
                                                            <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                                <img src="images/botao_editar_proibido.svg" height="30px" title="Avaliar solicitação - Alguém já está avaliando">
                                                            </a>
                                                        @else
                                                            <a class="btn" href="{{ route('avaliar-nada-consta', $requisicao->id) }}">
                                                                <img src="images/botao_editar.svg" height="30px" title="Avaliar solicitação">
                                                            </a>
                                                        @endif
                                                    @endif

                                                    @if($requisicao->status == 'Concluido')
                                                        <a class="btn" href="{{ route('visualizar-nada-consta', $requisicao->id) }}">
                                                            <img src="images/botao_visualizar.svg" height="30px" title="Visualizar solicitação">
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
                                                                        <h5 class="modal-title" id="exampleModalLabel">Status da Análise</h5>
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
                                                                                <br>
                                                                            </p>
                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Fechar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
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
                                                {{$count++}}
                                            </td>
                                            <td class="align-middle text-center">
                                                {{$requisicao->aluno->user->name}}
                                            </td>
                                            <td class="align-middle text-center">
                                                Comprovante Depósito
                                            </td>
                                            <td class="align-middle text-center">
                                                {{ date('d/m/Y H:i:s', strtotime($documento->created_at)) }}
                                            </td>
                                            <td class="align-middle text-center">
                                                @if($requisicao->status == 'Concluido')
                                                    <p class="mb-0" style="color: #1d643b; "><strong>Concluído</strong></p>
                                                @elseif($requisicao->status == 'Em andamento')
                                                    <p class="mb-0" style="color: #857b26"><strong>Em andamento</strong></p>
                                                @elseif($requisicao->status == 'Rejeitado')
                                                    <p class="mb-0" style="color: #4c110f"><strong>Rejeitado</strong></p>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <div class="btn-group">
                                                    <?php
                                                    $data_bibi = date_create_from_format('Y-m-d H:i:s', $requisicao->updated_at);
                                                    $data_agora = date_create_from_format('Y-m-d H:i:s', date('Y-m-d H:i:s'));
                                                    ?>
                                                    @if($requisicao->status == 'Em andamento')
                                                        @if($requisicao->bibliotecario_id != null && (date_diff($data_bibi, $data_agora)->h < 2))
                                                            <a class="btn" href="{{ route('avaliar-deposito', $requisicao->id) }}">
                                                                <img src="images/botao_editar_proibido.svg" height="30px" title="Avaliar solicitação - Alguém já está avaliando">
                                                            </a>
                                                            <a class="btn rounded-0" href="{{ route('visualizar-deposito', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Visualizar solicitação">
                                                            </a>
                                                        @else
                                                            <a class="btn" href="{{ route('avaliar-deposito', $requisicao->id) }}">
                                                                <img src="images/botao_editar.svg" height="30px" title="Avaliar solicitação">
                                                            </a>
                                                            <a class="btn" href="{{ route('visualizar-deposito', $requisicao->id) }}">
                                                                <img src="images/botao_visualizar.svg" height="30px" title="Visualizar solicitação">
                                                            </a>
                                                        @endif
                                                    @endif
                                                    @if($requisicao->status == 'Concluido')
                                                        <a class="btn" href="{{ route('visualizar-deposito', $requisicao->id) }}">
                                                            <img src="images/botao_visualizar.svg" height="30px" title="Visualizar solicitação">
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
                                                                        <h5 class="modal-title" id="exampleModalLabel">Status da Análise</h5>
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
                                                                                <br>
                                                                            </p>
                                                                            <p style="margin-left: 1rem">Motivo: <strong
                                                                                    style="color: #4c110f">{{ $requisicao->anotacoes }}</strong>
                                                                            </p>
                                                                        @endif
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Fechar
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
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

        $.fn.dataTable.ext.type.order['andamento-processo'] = function (d) {
            switch (d) {
                case 'Em andamento':
                    return 3;
                case 'Rejeitado':
                    return 2;
                case 'Concluído':
                    return 1;
            }
            return 0;
        };

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
            "order": [[4, 'desc']],
            "columnDefs": [
                {
                    "targets": [5],
                    "orderable": false
                },
                {
                    "targets": [4],
                    "type": "andamento-processo"
                }
            ]
        });

        $('.dataTables_filter').addClass('here');
        $('.dataTables_filter').addClass('');
        $('.here').addClass('center');
        $('.here').removeClass('dataTables_filter');
        $('.here').find('input').addClass('search-input');
        $('.here').find('input').addClass('align-middle');
        $('.here').find('label').contents().unwrap();
        $('.here').find('input').wrap('<div class="col-md-12 my-3 py-1" style="background-color: #C2C2C2; border-radius: 1rem;"> <div class="col-md-7 my-2"> <div class="col-md-12 p-1 img-search" style="background-color: white; border-radius: 0.5rem;"> </div> </div> </div>');
        $('.img-search').prepend('<img src="{{asset('images/search.png')}}" width="25px">');

    </script>
@endsection
