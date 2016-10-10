@extends('pages.master')

@push('posscripts')
    <script type="text/javascript" src="{{ asset('js/dynamic-address.js') }}"></script>

@endpush

@section('title', 'Dashboard')

@section('header')
    @include('modules.header.navbar')
@endsection

@section('content')
    <div class="container-fluid dashboard-bar rl-shadow-1">
        @include('modules.content.dashboard.master')
    </div>
    <div class="container margin-tb-40">
        @include('modules.content.dashboard.perfil')
    </div>
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection