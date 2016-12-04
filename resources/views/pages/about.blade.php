@extends('pages.master')

{{--  PAGE  --}}
@section('title', 'Sobre...')

@section('header')
    @include('modules.header.navbar')
    @include('modules.header.titlebar', [
        'name' => 'A Empresa',
    ])
@endsection

@section('content')
    @include('modules.content.about.master')
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection
