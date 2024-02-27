@extends('app.templates.html_padrao')
@section('titulo', 'Mostrar produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produtos</h1>
            <ul class="nav_fornecedor">
                <li><a href="{{ route('produtos.index') }}">Voltar</a></li>
            </ul>
        </div>



        <div class="informacao-pagina">
            <table border=1 style="margin:auto; width:50%">
                <tr>
                    <td>Id do produto</td>
                    <td>{{ $produto->id }}</td>
                </tr>

                <tr>
                <tr>
                    <td>Fornecedor do produto</td>
                    <td>{{ $produto->belongFornecedor()->nome }}</td>
                </tr>
                <td>Descrição</td>
                <td>{{ $produto->descricao }}</td>
                </tr>


                <tr>
                    <td>Peso</td>
                    <td>{{ $produto->peso }}</td>
                </tr>

                <tr>
                    <td>Unidade</td>
                    <td>{{ $unidade->descricao }}</td>
                </tr>

            </table>

        </div>


    </div>
    </div>

@endsection
