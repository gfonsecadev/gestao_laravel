@extends("app.templates.html_padrao")
@section("titulo","Clientes")

@section("conteudo")
<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Clientes</h1>
        <ul class="nav_fornecedor">
            <li><a href="{{route('clientes.create')}}" >Novo</a></li>
        </ul>
    </div>

<div class="informacao-pagina">
    <table border=1 width="100%">
         <thead>
             <tr>
                 <td>Id</td>
                 <td>Nome do cliente</td>
                 <td>Criar novo pedido</td>
                 <td>Excluir cliente</td>
             </tr>
         </thead>

         <tbody >
             @foreach($clientes as $cliente)
                 <tr>
                     <td>{{$cliente->id}}</td>
                     <td>{{$cliente->nome}}</td>
                     <td style="text-align:center"><a href={{route('pedidos.create',["cliente"=>$cliente])}} style="color:blue;" >+</a></td>
                     <td style="text-align:center">
                         <form method="post" id="form_prod_{{$cliente->id}}" action={{route('clientes.destroy',['cliente'=>$cliente])}} >
                             @csrf
                             @method("DELETE")
                           <a href="#" onclick="document.getElementById('form_prod_{{$cliente->id}}').submit()" style="color:red;">X</a>
                         </form>
                     </td>

                 </tr>
             @endforeach

         </tbody>



     </table>
</div>
@endsection
