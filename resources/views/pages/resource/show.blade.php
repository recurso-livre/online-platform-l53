@extends('pages.master')

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('vendor/smoothproducts/css/smoothproducts.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/jquery.rateyo.min.css') }}">
@endpush

@push('posscripts')
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery-migrate-3.0.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/smoothproducts/js/smoothproducts.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>

    <script>
        $(function () {
            $("#rating").rateYo({
                rating: {{ $rating->media }},
                starWidth: "50px",
                readOnly: true,
                multiColor: {
                  "startColor": "#F44336",
                  "endColor"  : "#4CAF50"
                },
                halfStar: true
            });
        });
    </script>
    <script type="text/javascript">
        /* wait for images to load */
        $(window).load( function() {
            $('.sp-wrap').smoothproducts();
        });
    </script>
@endpush

@section('title', $resource->name)

@section('header')
    @include('modules.header.navbar')
@endsection

@section('content')
    @include('modules.content.resource.show')
    @include('modules.content.budget.create-modal')
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection