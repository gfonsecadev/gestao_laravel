<h3>Página fornecedor</h3>


<h1>Olá</h1>
@php
echo $p2;

@endphp
<br/>


@if ($num<15)
        oi
@else
       tchau!!!
@endif

@unless($num<15)
    executa se for falso
@endunless
<br/>

@empty($vazia)
    Está variável está vazia
    <br>
@endempty

@isset($num)
    entra porque variavel está setada
    <br/>
    @isset($p3)
       não entra porque variavel nao está setada
    @endisset
@endisset

<br>

@foreach ( $nomes  as $key => $nome )
{{$key." ".$nome}}<br>
    {{var_dump($loop)}} {{--variável $loop está disponivél somente nos laços foreach e forelse--}}
@endforeach

<br>

@for($i=0;$i<count($nomes);$i++)
    {{$i." ". $nomes[$i]}} <br>
@endfor

<br>

@forelse ( $nomes2  as $key => $nome )
{{$key." ".$nome}}<br>
@empty
    Não existe  valor a ser mostrado nesta variável

@endforelse

<br>

{{$nomes[4] ?? "variável vazia"}}

<br>

@php $j=0; @endphp
@while($j<count($nomes))

    {{$nomes[$j]}}<br>
    @php $j++; @endphp

@endwhile

@switch($nomes[0])
    @case("Gilmar")
        Olá Gilmar!!!<br>
        @break
@endswitch

@{{$nomes}}, para escapar caracteres





