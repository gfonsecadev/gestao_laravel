<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield("titulo")</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../css/estilo.css">

    </head>
    {{-- este é o arquivo principal --}}
    <body>
    {{-- inclui o template neste arquivo --}}
       @include("app.templates.cabecalho")

       {{-- aqui será renderizada as sections de outros componentes
             que contém "conteudo" --}}
       @yield("conteudo")
    </body>
</html>
