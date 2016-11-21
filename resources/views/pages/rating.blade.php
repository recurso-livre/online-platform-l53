@extends('pages.master')

@push('stylesheets')

    <link rel="stylesheet" href="{{ asset('css/jquery.rateyo.min.css') }}">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.css">-->

@endpush

@push('posscripts')
    <script type="text/javascript" src="{{ asset('js/jquery.rateyo.min.js') }}"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.2.0/jquery.rateyo.min.js"></script>-->
    
    <script>
        $(function () {
            $("#rateYo").rateYo({
                rating: 0,
                multiColor: {
                  "startColor": "#F44336",
                  "endColor"  : "#4CAF50"
                },
                halfStar: true,
                onSet: function (rating, rateYoInstance) {
                    $("#rating").val(rating);
                }
            });
        });
    </script>
@endpush

@section('title', 'Pontuar')

@section('header')
    @include('modules.header.navbar')
    @include('modules.header.titlebar', [
        'name' => 'Cadastrar Recurso',
    ])
@endsection

@section('content')

    <div class="container margin-tb-40">
        <div class="row">
            <div class="col-md-12">
                <h3>Nota</h3>
                <div id="rateYo"></div>
            </div>
        </div>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('auth.budget.rating.store') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-12">
                    <h3>Comentário</h3>
                    <div class="input-group">
                        <span class="input-group-addon">*</span>
                        <input id="comment" type="text" value="" name="comment" class="form-control" placeholder="Comentário">
                        <input id="rating" type="hidden" value="5" name="rating">
                        <input id="budget" type="hidden" value="{{ $budgetId }}" name="budgetId">
                    </div>
                </div>
            </div>
    
            <div class="divider"></div>
            
            <div class="row">
                <div class="col-md-12">
                    <button class="btn btn-lg btn-primary pull-right" type="submit">Classificar</button>
                </div>
            </div>
        </form>
    </div>
    
@endsection

@section('footer')
    @include('modules.footer.master')
@endsection