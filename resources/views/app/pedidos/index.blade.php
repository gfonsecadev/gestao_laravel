@extends("app.templates.html_padrao")
@section("titulo","Listar Pedidos")

@section("conteudo")
         <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Pedidos</h1>
            </div>



            <div class="informacao-pagina">
                   <table border=1 width="100%">
                        <thead>
                            <tr>
                                <td>Id do pedido</td>
                                <td>Nome do cliente</td>
                                <td>Quantidade de produtos</td>
                                <td>Vizualizar produtos</td>
                                <td>Adicionar mais produtos ao pedido</td>
                                <td>Excluir pedido</td>
                            </tr>
                        </thead>

                        <tbody >
                            @foreach($pedidos as $pedido)
                                <tr>
                                    <td>{{$pedido->id}}</td>
                                    <td>{{$pedido->cliente->nome}}</td>
                                    <td>{{$pedido->produtos()->count()}}
                                    <td><a style="color:blue" href="{{route('pedidos.show',['pedido'=>$pedido->id])}}">O</a></td>
                                    <td><a style="color:green" href="{{route('pedidos.edit',['pedido'=>$pedido->id])}}">O</a></td>
                                    <td>
                                        <form id="{{$pedido->id}}" method="POST" action="{{route('pedidos.destroy',['pedido'=>$pedido->id])}}">
                                            @csrf
                                            @method("DELETE")
                                            <a style="color:red" href="#" onclick="document.getElementById({{$pedido->id}}).submit()">X</a>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>



                    </table>
            </div>

                    {{-- paginação --}}
                    {{--   {{$pedidos->appends($request->all())->links()}}

                    Total do registros por página:{{ $pedidos->count()}}
                    <br>
                    Total do registros encontrados: {{ $pedidos->total()}}
                    <br>
                    Número do primeiro registro: {{$pedidos->firstItem()}}
                    <br>
                    Número do último registro:{{ $pedidos->lastItem()}} --}}
            </div>
    </div>

@endsection
