@extends('layouts.app')

@section('conteudo')
    <div class="container">

        <div class="row justify-content-sm-center">
            <div class="col-md-11">
                <h2 class="tituloListagem">Listagem de Campus</h2>
                <a href="{{ route('cadastro-campus') }}">
                    <img src="/images/botao_add.svg" style="background-color: #1b1e21">
                </a>
            </div>

        </div>
        <div class="row justify-content-center">
            <div class="col-md-11">
                <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" class="titleColumn text-center" style="cursor:pointer">Campus</th>
                        <th scope="col" class="titleColumn text-center"
                            style="cursor:pointer">Instituição</th>
                        <th scope="col"  class="titleColumn text-center"
                            style="cursor:pointer">Ação</th>
                    </tr>
                    </thead>
                    <tbody class="align-middle">
                    @foreach($unidades as $unidade)
                        <tr>
                            <td class="align-middle text-center">
                                {{ $unidade->id }}
                            </td>
                            <td class="align-middle text-center">
                                {{ $unidade->nome }}
                            </td>
                             <td class="align-middle text-center">
                                 {{ \App\Models\Instituicao::find($unidade->instituicao_id)->nome }}
                            </td>
                            <td class="align-middle text-center">
                                <div>
                                    <a href="{{ route("listar-cursos", ['unidade_id' => $unidade->id]) }}">Listar Cursos</a>
                                </div>
                                <div>
                                    <a href="{{ route("cadastro-curso", ['unidade_id' => $unidade->id]) }}">Cadastrar Curso</a>
                                </div>
                                <div>
                                    <a href="{{ route("listar-bibliotecas", ['unidade_id' => $unidade->id]) }}">Listar Bibliotecas</a>
                                </div>
                                <div>
                                    <a href="{{ route("cadastro-biblioteca", ['unidade_id' => $unidade->id]) }}">Cadastrar Biblioteca</a>
                                </div>
                            </td>
                        </tr>
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
                "targets": [3],
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
