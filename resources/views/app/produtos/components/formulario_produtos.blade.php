@if(isset($produto))
<form action="{{route('produtos.update',['produto'=>$produto])}}" method="post">
                        @method("PUT")
                        @csrf
@else
 <form action="{{route('produtos.store')}}" method="post">
                        @csrf
@endif

                        
                       <input type="text" placeholder="Nome" class="borda-preta" name="nome" value={{isset($produto) ? $produto->nome : old("nome")}}>
                        <br>
                           <div class="validation"> {{$errors->has("nome") ? $errors->first("nome") : ""}}</div>
                        <br>
                        <input type="text" placeholder="Descrição" class="borda-preta" name="descricao" value={{isset($produto) ? $produto->descricao : old("descricao")}}>
                           <div class="validation"> {{$errors->has("descricao") ? $errors->first("descricao") : ""}}</div>
                        <br>
                        <input type="number" placeholder="Peso" class="borda-preta" name="peso" value={{isset($produto) ? $produto->peso : old("peso")}}>
                        <div class="validation">{{$errors->has("peso") ? $errors->first("peso") : ""}}</div>
                        <br>
                        <select class="borda-preta" name="unidade_fk">
                            <option value="aqui da erro">Insira a unidade de medida</option>

                            @foreach ($unidades as $key=>$unidade )
                                <option value= {{$unidade->id}} {{isset($produto) && $produto->unidade_fk== $unidade->id || old("unidade_fk") == $unidade->id ? "selected" : ""}} >{{$unidade->descricao}}</option>
                            @endforeach
                        </select>
                        <br>
                        <div class="validation">{{$errors->has("unidade_fk") ? $errors->first("unidade_fk") : ""}}</div>

                        <br>
                        <button type="submit" class="borda-preta">{{isset($produto) ? "Atualizar produto" : "Adicionar produto"}}</button>
  </form>

