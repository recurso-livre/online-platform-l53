<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload de Arquivo</title>
</head>
<body>
    <h1>Upload de Arquivo</h1>
    
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    <br/>
    
    {{ Form::open(['url' => route('auth.storage.upload'), 'enctype' => 'multipart/form-data']) }}
    {{ Form::file('file') }}
    {{ Form::submit('Enviar arquivo') }}
    {{ Form::close() }}
    
    <hr/>
    
    <ul>
        @foreach($ls as $filename)
            <li>{{ $filename }} :: <a href="{{ Storage::url($filename) }}">{{ Storage::url($filename) }}</a>
                {{ Form::open(['url' => route('auth.storage.delete')]) }}
                  <input type="hidden" name="_method" value="DELETE">
                  <input type="hidden" name="del_filename" value="{{ $filename }}">
                {{ Form::submit('Excluir') }}
                {{ Form::close() }}
            </li>
        @endforeach
    </ul>
    
</body>
</html>