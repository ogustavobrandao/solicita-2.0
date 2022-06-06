<div class="nav navbar-nav navbar-right">
    <ul class="nav navbar-nav navbar-right">
        @if(Auth::check())
            <div class="dropdown">
                <a id="dropdown_perfil" name="dropdown_perfil" class="dropdown dropdown-toggle" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>Olá,</b> {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">

                    <a class="dropdown-item" href="{{ route('alterar-senha-servidor') }}"
                       onclick="event.preventDefault();
                           document.getElementById('servidor-form').submit();" style="color:black;" selection__placeholder="Alterar senha">
                    <!-- <img src="{{asset('images/senha.png')}}" height="20" class="d-inline-block align-top" alt="" style="color:white"> -->
                        Alterar senha
                    </a>
                    <form id="servidor-form" action="{{ route('alterar-senha-servidor') }}" method="GET" style="display: none; margin-right:20px">
                        @csrf
                    </form>

                    <a class="dropdown-item"
                       href="{{ route('listar_alunos') }}" style="color:black;">
                        <span class="mr-1"> Alunos </span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>

                    <a class="dropdown-item"
                       href="{{ route('relatorio-requisicoes') }}" style="color:black;">
                        <span class="mr-1"> Relatorios </span>
                        <svg class="bi bi-archive" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M2 5v7.5c0 .864.642 1.5 1.357 1.5h9.286c.715 0 1.357-.636 1.357-1.5V5h1v7.5c0 1.345-1.021 2.5-2.357 2.5H3.357C2.021 15 1 13.845 1 12.5V5h1z"
                                  clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M5.5 7.5A.5.5 0 016 7h4a.5.5 0 010 1H6a.5.5 0 01-.5-.5zM15 2H1v2h14V2zM1 1a1 1 0 00-1 1v2a1 1 0 001 1h14a1 1 0 001-1V2a1 1 0 00-1-1H1z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </a>

                    <a class="dropdown-item"
                       href="{{ route('pesquisar-aluno') }}" style="color:black;">
                        <span class="mr-1"> Pesquisar </span>
                        <svg class="bi bi-search" width="1.5em" height="1.5em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 011.415 0l3.85 3.85a1 1 0 01-1.414 1.415l-3.85-3.85a1 1 0 010-1.415z" clip-rule="evenodd"/>
                            <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 100-11 5.5 5.5 0 000 11zM13 6.5a6.5 6.5 0 11-13 0 6.5 6.5 0 0113 0z" clip-rule="evenodd"/>
                        </svg>
                    </a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Sair </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                          style="display: none; margin-right:20px">
                        @csrf
                    </form>
                </div>
            </div>
        @endif
    </ul>
</div>
@php($url = str_replace(URL::to('/'),'',URL::current()))
