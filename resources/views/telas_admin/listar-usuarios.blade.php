@extends('layouts.app')

@section('conteudo')

<div class="container">

    <div class="row justify-content-sm-center">
        <div class="col-md-11">
            <div class="tituloListagem">Usuários</div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-11">
            <table class="table table-borderless shadow table-hover mb-2" style="border-radius: 1rem; background-color: white; border: none" id="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col" class="titleColumn">Email</th>
                    <th scope="col" class="titleColumn text-center"
                        style="cursor:pointer">Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td class="align-middle">
                            {{ $usuario->id }}
                        </td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td class="text-center"><a href="{{ route('editar-usuario', ['id_usuario' => $usuario->id]) }}">
                                <img src="images/botao_editar.svg" height="30px"
                                     title="Editar Usuário"></a></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/datatables.js') }}"></script>
@endpush