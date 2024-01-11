@extends("app.templates.html_padrao")
@section("titulo","Criar novo produto")

@section("conteudo")
      <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Produtos</h1>
                <ul class="nav_fornecedor">
                    <li><a href="{{route('produtos.index')}}" >Voltar</a></li>
                    <li><a href="" >Consulta</a></li>
                </ul>
            </div>

       @component("app.produtos.components.formulario_produtos",["unidades"=>$unidades])
       @endcomponent
      </div>

@endsection