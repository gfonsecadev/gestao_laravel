{{-- se houver a variavel abaixo o formulário será para adiçaõ de produtos no pedido --}}
@if(isset($pedido))
    <form action="{{ route('pedidos.update',["pedido"=>$pedido->id]) }}" method="post">
        @csrf
        @method("PUT")

@else
    {{-- senão é a primeira adiçaõ de produto --}}
    <form action="{{ route('pedidos.store',["cliente_id"=>$cliente->id]) }}" method="post">
        @csrf

@endif




    <input type="text" placeholder="Nome do cliente" class="borda-preta" value="{{ $cliente->nome }}"  name="nome" disabled
        value={{ isset($produto) ? $produto->nome : old('nome') }}>
    <br>
    <div class="validation"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>
    <input type="hidden" name="cliente_id" value="{{ $cliente->id}}">{{-- input oculto para envio do id do cliente --}}
    <br>
    <select class="borda-preta" name="produto_id">
        <option value="aqui da erro">Insira um produto para o pedido</option>

        @foreach ($produtos as $key => $produto)
            <option value={{ $produto->id }}> {{-- essa expressão abaixo seleciona um option se estiver em edição ou der erro na criação --}}
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    <br>
    <div class="validation">{{ $errors->has('produto_id_fk') ? $errors->first('produto_id_fk') : '' }}</div>
    <br>
    <button type="submit"
        class="borda-preta">Criar pedido</button>
</form>
