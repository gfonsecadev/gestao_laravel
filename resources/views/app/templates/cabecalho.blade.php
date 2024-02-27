<div class="topo">

    <div class="logo">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
    </div>

    <div class="menu">
        <ul>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'app.home' ? 'active' : '' }}"
                    href="{{ route('app.home') }}">Home</a></li>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'app.clientes' ? 'active' : '' }}"
                    href="{{ route('clientes.index') }}">Clientes</a></li>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'pedidos.index' ? 'active' : '' }}"
                    href="{{ route('pedidos.index') }}">Pedidos</a></li>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'produtos.index' ? 'active' : '' }}"
                    href="{{ route('produtos.index') }}">Produtos</a></li>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'app.fornecedores' ? 'active' : '' }}"
                    href="{{ route('app.fornecedores') }}">Fornecedores</a></li>
            <li><a class="{{ Route::getCurrentRoute()->getName() == 'site.sair' ? 'active' : '' }}"
                    href="{{ route('site.sair') }}">Sair</a></li>
        </ul>
    </div>
</div>
