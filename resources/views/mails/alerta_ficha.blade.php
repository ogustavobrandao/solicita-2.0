@component("mail::message")

    <p>{{ $biblioteca->nome }}.<br>
    Há uma nova solicitação de ficha catalográfica feita pelo aluno: {{ $usuarioSolicitante->name }}!</p>

    @component("mail::button", ["url"=>route("home")])
        CLIQUE AQUI PARA ACESSAR O SOLICITA
    @endcomponent

@endcomponent
