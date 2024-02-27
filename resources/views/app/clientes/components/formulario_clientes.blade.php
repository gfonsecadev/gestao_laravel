@if (isset($cliente))
    <form action="{{ route('clientes.update', ['cliente' => $cliente]) }}" method="post">
        @method('PUT')
        @csrf
    @else
        <form action="{{ route('clientes.store') }}" method="post">
            @csrf
@endif



<input type="text" placeholder="Nome do cliente" class="borda-preta" name="nome"
    value={{ isset($cliente) ? $cliente->nome : old('nome') }}>
<br>
<div class="validation"> {{ $errors->has('nome') ? $errors->first('nome') : '' }}</div>
<br>

<button type="submit" class="borda-preta">{{ isset($cliente) ? 'Atualizar cliente' : 'Adicionar cliente' }}</button>
</form>
