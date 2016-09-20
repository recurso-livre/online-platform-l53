@extends('pages.master')

@section('title', 'Login')

@section('header')
    @include('modules.header.navbar')
    @include('modules.header.titlebar', [
        'name' => 'Acessar minha conta',
    ])
@endsection

@section('content')
    <div class="container margin-tb-40">
        @include('modules.content.user.login')
    </div>
    
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection