@extends("app.templates.html_padrao")
@section("titulo","Editar produto")

@section("conteudo")
      <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Adicionar produtos ao pedido</h1>
                <ul class="nav_fornecedor">
                    <li><a href="{{route('pedidos.index')}}" >Voltar</a></li>
                </ul>
            </div>

        @component("app.pedidos.components.formulario_pedidos",["produtos"=>$produtos,"cliente"=>$cliente,"pedido"=>$pedido])
        @endcomponent

      </div>

@endsection
