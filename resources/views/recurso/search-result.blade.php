<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resultado da Pesquisa de Recurso</title>
</head>
<body>
    <h1>Resultado da Pesquisa de Recurso</h1>

    <ul>
        @foreach($resources as $resource)
            <li>
                {{ $resource->name }}<br/>
                {{ $resource->informalDescription }}<br/><br/>
            </li>
        @endforeach
    </ul>

</body>
</html>