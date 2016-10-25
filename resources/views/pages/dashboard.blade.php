@extends('pages.master')

@push('stylesheets')

    <link rel="stylesheet" href="{{ asset('vendor/materialize/css/materialize.css') }}" type="text/css" />
    
@endpush

@push('posscripts')
    
    <script type="text/javascript" src="{{ asset('js/dynamic-address.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/sendbird/SendBird.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/materialize/js/materialize.min.js') }}"></script>
    
@endpush

@section('title', 'Dashboard')

@section('header')
    @include('modules.header.navbar')
@endsection

@section('content')

    <div class="container-fluid dashboard-bar rl-shadow-1">
        @include('modules.content.dashboard.master')
    </div>
    
    <div class="tab-content">
        <div id="perfil" class="tab-pane fade in active">
            <div class="container margin-tb-40">
                @include('modules.content.dashboard.perfil')
            </div>
        </div>
        <div id="budget" class="tab-pane fade">
            <div class="container margin-tb-40">
                @include('modules.content.dashboard.budget')
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('modules.footer.master')
@endsection