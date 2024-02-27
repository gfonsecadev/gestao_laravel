<div class="topo">

            <div class="logo">
                <img src="{{asset('img/logo.png')}}">
            </div>

            <div class="menu">
                <ul>
                    <li><a class="{{ Route::getCurrentRoute()->getName() == 'site.principal' ? 'active' : '' }}" href="{{ route('site.principal') }}">Principal</a></li>
                    <li><a class="{{ Route::getCurrentRoute()->getName() == 'site.sobrenos' ? 'active' : '' }}" href="{{ route('site.sobrenos') }}">Sobre Nós</a></li>
                    <li><a class="{{ Route::getCurrentRoute()->getName() == 'site.contato' ? 'active' : '' }}" href="{{ route('site.contato') }}">Contato</a></li>
                    <li><a class="{{ Route::getCurrentRoute()->getName() == 'site.login' ? 'active' : '' }}" href="{{ route('site.login') }}">Entrar</a></li>
                </ul>
            </div>
</div>

