<!-- Barra de Logos -->
<div id="barra-logos">
    <!-- se o usuário estiver logado -->
@if(Auth::check())
    <!-- Se o usuário for um aluno -->
    @if(Auth::user()->tipo == 'aluno')
        <!-- carrega o componente contendo Navbar do aluno -->
        @component('componentes.navbarAluno')
        @endcomponent
    @endif

    <!-- Se o usuário for um servidor -->
    @if(Auth::user()->tipo == 'servidor')
        <!-- Carrega component contendo navbar2.blade.php do servidor -->
        @component('componentes.navbarServidor')
        @endcomponent
    @endif

    @if(Auth::user()->tipo == 'administrador')
        <!-- Carrega component contendo navbar2.blade.php do administrador -->
        @component('componentes.navbarAdministrador')
        @endcomponent
    @endif

    <!-- Se o usuário for um bibliotecario -->
    @if(Auth::user()->tipo == 'bibliotecario')
        <!-- carrega o componente contendo Navbar do bibliotecario -->
            @component('componentes.navbarBibliotecario')
            @endcomponent
        @endif
    @endif
</div>
