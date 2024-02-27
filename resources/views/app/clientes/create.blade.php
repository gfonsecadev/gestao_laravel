
{{-- para qual componente será extendido --}}
@extends("app.templates.html_padrao")

{{-- cada section terá um yield para renderiza-la --}}

{{-- section para preencher o titulo da página (tag <title>) --}}
@section("titulo","Criar novo cliente")


@section("conteudo")
      <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Produtos</h1>
                <ul class="nav_fornecedor">
                    <li><a href="{{route('clientes.index')}}" >Voltar</a></li>
                </ul>
            </div>
            {{-- passamos as variavéis recebidas do controller para o componente --}}
       @component("app.clientes.components.formulario_clientes")
       @endcomponent
      </div>
@endsection
