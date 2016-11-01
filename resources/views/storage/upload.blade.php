<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de Arquivo</title>
</head>
<body>
    <h1>Upload de Arquivo</h1>
    
    {{ Form::open(['url' => route('auth.storage.upload'), 'enctype' => 'multipart/form-data']) }}
    {{ Form::file('file') }}
    {{ Form::submit('Enviar arquivo') }}
    {{ Form::close() }}
    
</body>
</html>