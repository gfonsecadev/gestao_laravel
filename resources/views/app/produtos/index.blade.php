@extends("app.templates.html_padrao")
@section("titulo","Listar Produtos")

@section("conteudo")
         <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Produtos</h1>
                <ul class="nav_fornecedor">
                    <li><a href="{{route('produtos.create')}}" >Novo</a></li>
                </ul>
            </div>



            <div class="informacao-pagina">
                   <table border=1 width="100%">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Fornecedor</td>
                                <td>Nome do produto</td>
                                <td>Descrição</td>
                                <td>Peso</td>
                                <td>Unidade</td>
                                <td>Visualizar</td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>

                        <tbody >
                            @foreach($produtos as $produto)
                                <tr>
                                    <td>{{$produto->id}}</td>
                                    <td>{{$produto->belongFornecedor()->nome}}</td>
                                    <td>{{$produto->nome}}</td>
                                    <td>{{$produto->descricao}}</td>
                                    <td>{{$produto->peso}}</td>
                                    <td>{{$produto->unidadeBelong()}}</td>
                                    <td style="text-align:center"><a href={{route('produtos.show',["produto"=>$produto])}} style="color:blue;" >Visualizar</a></td>
                                    <td style="text-align:center"><a href={{route('produtos.edit',["produto"=>$produto])}} style="color:green;">O</a></td>
                                    <td style="text-align:center">
                                        <form method="post" id="form_prod_{{$produto->id}}" action={{route('produtos.destroy',['produto'=>$produto])}} >
                                            @csrf
                                            @method("DELETE")
                                          <a href="#" onclick="document.getElementById('form_prod_{{$produto->id}}').submit()" style="color:red;">X</a>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach

                        </tbody>



                    </table>
            </div>

                    {{-- paginação fins didáticos
                      {{$produtos->appends($request->all())->links()}}

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
