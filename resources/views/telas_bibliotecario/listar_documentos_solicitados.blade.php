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
                <form class="px-5" action="{{route('listar-fichas')}}" method="get">
                    <div class="input-group">
                        <input class="form-control rounded-start" type="search" name="search" id="search" placeholder="Buscar requisições..." value="{{request('search')}}">
                        <button type="submit" class="btn btn-outline-primary rounded-end">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                            </svg>
                        </button>
                    </div>
                </form>
                <table class="table table-borderless shadow table-hover mb-2"
                       style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                        <tr>
                            <th scope="col" class="border-bottom-0 py-3">#</th>
                            <th scope="col" class="titleColumn border-bottom-0 py-3" style="cursor:pointer">@sortablelink('autor_nome', 'Autor')</th>
                            <th scope="col" class="titleColumn text-center border-bottom-0 py-3"
                                style="cursor:pointer">Tipo do Documento
                            </th>
                            <th scope="col" class="titleColumn text-center border-bottom-0 py-3"
                                style="cursor:pointer">@sortablelink('entity_created_at', 'Data da Requisição')
                            </th>
                            <th scope="col" class="text-center border-bottom-0 py-3">@sortablelink('status', 'Status')</th>
                            <th scope="col" class="text-center border-bottom-0 py-3">Ação</th>
                            <th scope="col" class="text-center border-bottom-0 py-3">@sortablelink('entity_updated_at', 'Data de análise')</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        @foreach($requisicoesFichas as $i => $requisicao)
                            @if($requisicao->ficha_catalografica_id != null)
                                <tr>
                                    <td class="align-middle text-center" scope="row">
                                        {{$i + 1 + ($requisicoesFichas->firstItem() - 1) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$requisicao->fichaCatalografica->autor_nome}}
                                    </td>
                                    <td class="align-middle text-center">
                                        Ficha Catalográfica -
                                        @if ($requisicao->fichaCatalografica->tipo_documento_id == 2)Monografia
                                        @elseif ($requisicao->fichaCatalografica->tipo_documento_id == 4)Tese
                                        @elseif ($requisicao->fichaCatalografica->tipo_documento_id == 3)Produto Educacional
                                        @elseif ($requisicao->fichaCatalografica->tipo_documento_id == 1)Dissertação
                                        @endif
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ date('d/m/Y H:i:s', strtotime($requisicao->fichaCatalografica->created_at)) }}
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
                            @elseif($requisicao->nada_consta_id != null)
                                <tr>
                                    <td class="align-middle text-center" scope="row">
                                        {{$i + 1 + ($requisicoesFichas->firstItem() - 1) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$requisicao->nadaConsta->autor_nome ?? $requisicao->aluno->user->name}}
                                    </td>
                                    <td class="align-middle text-center">
                                        Comprovante Nada Consta
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ date('d/m/Y H:i:s', strtotime($requisicao->nadaConsta->created_at)) }}
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
                            @elseif($requisicao->deposito_id != null)
                                <tr>
                                    <td class="align-middle text-center" scope="row">
                                        {{$i + 1 + ($requisicoesFichas->firstItem() - 1) }}
                                    </td>
                                    <td class="align-middle text-center">
                                        {{$requisicao->deposito->autor_nome ?? $requisicao->aluno->user->name}}
                                    </td>
                                    <td class="align-middle text-center">
                                        Comprovante Depósito
                                    </td>
                                    <td class="align-middle text-center">
                                        {{ date('d/m/Y H:i:s', strtotime($requisicao->deposito->created_at)) }}
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
                    </tbody>
                </table>
                <div class="pagination d-flex flex-column">
                    {{ $requisicoesFichas->appends(request()->except('page'))->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
    
@push('scripts')
    <script src="{{ asset('js/datatables.js') }}"></script>
@endpush