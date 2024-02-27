@if (isset($produto))
    <form action="{{ route('produtos.update', ['produto' => $produto]) }}" method="post">
        @method('PUT')
        @csrf
    @else
        <form action="{{ route('produtos.store') }}" method="post">
            @csrf
@endif



<select class="borda-preta" name="fornecedor_id_fk">
    <option value="aqui da erro">Insira um fornecedor para o produto</option>

    @foreach ($fornecedores as $key => $fornecedor)
        <option value={{ $fornecedor->id }}
             {{-- essa expressão abaixo seleciona um option se estiver em edição ou der erro na criação --}}

             {{-- se produto estiver setado e id do fornecedor do produto for igual ao fornecedor trazido do banco para preencher o select , selecionamos o option --}}
            {{ (isset($produto) && $produto->belongFornecedor()->id == $fornecedor->id) == $fornecedor->id ? 'selected' : '' }}>
            {{ $fornecedor->nome }}</option>
    @endforeach
</select>
<div class="validation">{{$errors->has('fornecedor_id_fk') ? $errors->first('fornecedor_id_fk') : ''}}</div>

<input type="text" placeholder="Nome do produto" class="borda-preta" name="nome"
    value={{ isset($produto) ? $produto->nome : old('nome') }}>
<br>
<div class="validation"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>
<br>
<div>
    <input type="text" placeholder="Descrição" class="borda-preta" name="descricao"
        value={{ isset($produto) ? $produto->descricao : old('descricao') }}>
    <div class="validation"> {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</div>
    <br>
    <input type="number" placeholder="Peso" class="borda-preta" name="peso"
        value={{ isset($produto) ? $produto->peso : old('peso') }}>
    <div class="validation">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</div>
    <br>
    <select class="borda-preta" name="unidade_id_fk">
        <option value="aqui da erro">Insira a unidade de medida</option>

        @foreach ($unidades as $key => $unidade)
            <option value={{ $unidade->id }} {{-- essa expressão abaixo seleciona um option se estiver em edição ou der erro na criação --}}
                {{ (isset($produto) && $produto->unidade_id_fk == $unidade->id) == $unidade->id ? 'selected' : '' }}>
                {{ $unidade->descricao }}</option>
        @endforeach
    </select>
    <br>
    <div class="validation">{{ $errors->has('unidade_id_fk') ? $errors->first('unidade_id_fk') : '' }}</div>
</div>
<br>
<button type="submit" class="borda-preta">{{ isset($produto) ? 'Atualizar produto' : 'Adicionar produto' }}</button>
</form>
