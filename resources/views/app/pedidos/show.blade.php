@extends("app.templates.html_padrao")
@section("titulo","Mostrar Produtos do produto")

@section("conteudo")
         <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Produtos no pedido</h1>
                <ul class="nav_fornecedor">
                    <li><a href="{{route('pedidos.index')}}" >Voltar</a></li>
                </ul>
            </div>



            <div class="informacao-pagina">
                   <table border=1 width="100%">
                        <thead>
                            <tr>
                                <td>Id do produto</td>
                                <td>Nome do produto</td>
                            </tr>
                        </thead>

                        <tbody >
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->nome}}</td>
                                </tr>
                            @endforeach

                        </tbody>



                    </table>
            </div>

                    {{-- paginação --}}
                    {{--   {{$produtos->appends($request->all())->links()}}

                    Total do registros por página:{{ $produtos->count()}}
                    <br>
                    Total do registros encontrados: {{ $produtos->total()}}
                    <br>
                    Número do primeiro registro: {{$produtos->firstItem()}}
                    <br>
                    Número do último registro:{{ $produtos->lastItem()}} --}}
            </div>
    </div>

@endsection
