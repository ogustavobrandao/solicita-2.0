<!-- Barra de Logos -->
<div id="barra-logos">
    <ul id="logos" style="list-style:none;">
        <li style="margin-right:140px; margin-left:110px; border-right:1px ;height: 120px">
            <a href="{{ route('login') }}"><img src="{{asset('images/logo.png')}}"
                                                style="margin-left: 8px; margin-top:5px " height="120px"
                                                align="left"></a>

            <a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{asset('images/lmts.jpg')}}"
                                                                     style="margin-left: 8px; margin-top:30px "
                                                                     height="70%" align="right"></a>
            <img src="{{asset('images/separador.png')}}" style="margin-left: 15px; margin-top: 30px" height="70"
                 align="right">
            <a target="_blank" href="http://www.ufrpe.br/"><img src="{{asset('images/ufrpe.png')}}"
                                                                style="margin-left: 8px; margin-top:30px " height="70"
                                                                align="right"></a>

            <img src="{{asset('images/separador.png')}}" style="margin-left: 15px; margin-top: 30px" height="70"
                 align="right">
            <a target="_blank" href="http://ww3.uag.ufrpe.br/"><img src="{{asset('images/logoUfapeAzul.svg')}}"
                                                                    style="margin-left: 15px; margin-right: -10px; margin-top: 30px "
                                                                    height="70" width="50" align="right"></a>
        </li>
    </ul>

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
