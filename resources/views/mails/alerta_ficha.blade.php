@component("mail::message")

    Olá, {{ $usuarioBibliotecario->name }}.
    Há uma nova solicitação de ficha catalográfica feita pelo aluno: {{ $usuarioSolicitante->name }}!

    @component("mail::button", ["url"=>route("home")])
        CLIQUE AQUI PARA ACESSAR O SOLICITA
    @endcomponent
@endcomponent
