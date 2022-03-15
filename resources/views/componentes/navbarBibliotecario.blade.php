<div class="nav navbar-nav navbar-right">
    <ul class="nav navbar-nav">
        @if(Auth::check())
            <div class="dropdown">
                <a id="dropdown_perfil" name="dropdown_perfil" class="dropdown dropdown-toggle" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>Olá,</b> {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown">
                    <a class="dropdown-item" href="{{ route('home') }}"
                       onclick="event.preventDefault();document.getElementById('usuario-form').submit();">
                        Editar Perfil </a>
                    <form id="usuario-form" action="{{ route('perfil-bibliotecario') }}" method="GET"
                          style="display: none;">
                        @csrf
                    </form>

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
