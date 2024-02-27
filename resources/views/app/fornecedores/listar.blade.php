@extends("app.templates.html_padrao")
@section("titulo","Listar Fornecedores")

@section("conteudo")
         <div class="conteudo-pagina">
            <div class="titulo-pagina">
                <h1>Fornecedores</h1>
                <div class="nav_fornecedor">
                    <ul  >
                         <li><a href={{route("app.fornecedores.consultar")}} >Voltar</a></li>
                    </ul>
                </div>
            </div>

            <div class="informacao-pagina">
                   <table border=1 width="100%">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Nome</td>
                                <td>Site</td>
                                <td>Email</td>
                                <td>Estado</td>
                                <td>Editar</td>
                                <td>Excluir</td>
                            </tr>
                        </thead>

                        <tbody >
                            @foreach($fornecedores as $fornecedor)
                                <tr>
                                    <td>{{$fornecedor->id}}</td>
                                    <td>{{$fornecedor->nome}}</td>
                                    <td>{{$fornecedor->site}}</td>
                                    <td>{{$fornecedor->email}}</td>
                                    <td>{{$fornecedor->uf}}</td>
                                    <td style="text-align:center"><a href={{route('app.fornecedores',["id"=>$fornecedor->id])}} style="color:green;">O</a></td>
                                    <td style="text-align:center"><a href={{route('app.fornecedores.excluir',["id"=>$fornecedor->id])}} style="color:red;">X</a></td>

                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                     {{-- paginação fins didáticos
                         {{$fornecedores->appends($request)->links()}}

                    Total do registros por página:{{ $fornecedores->count()}}
                    <br>
                    Total do registros encontrados: {{ $fornecedores->total()}}
                    <br>
                    Id do primeiro registro: {{$fornecedores->firstItem()}}
                    <br>
                    Id do último registro:{{ $fornecedores->lastItem()}}   --}}
            </div>
    </div>

@endsection
