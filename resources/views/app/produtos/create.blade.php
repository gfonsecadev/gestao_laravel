
{{-- para qual componente será extendido --}}
@extends("app.templates.html_padrao")

{{-- cada section terá um yield para renderiza-la --}}

{{-- section para preencher o titulo da página (tag <title>) --}}
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
            {{-- passamos as variavéis recebidas do controller para o componente --}}
       @component("app.produtos.components.formulario_produtos",["unidades"=>$unidades, "fornecedores"=>$fornecedores])
       @endcomponent
      </div>
@endsection
