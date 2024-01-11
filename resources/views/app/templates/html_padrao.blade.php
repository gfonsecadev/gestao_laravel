<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Super Gestão - @yield("titulo")</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../../css/estilo.css">
       
    </head>

    <body>
       @include("app.templates.cabecalho")
       @yield("conteudo")
    </body>
</html>