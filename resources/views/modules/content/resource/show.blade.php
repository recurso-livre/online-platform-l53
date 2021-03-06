<style type="text/css">
    .resource-header {
        background: rgba(245,245,245,1);
        background: -moz-linear-gradient(top, rgba(245,245,245,1) 0%, rgba(232,232,232,1) 100%);
        background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(245,245,245,1)), color-stop(100%, rgba(232,232,232,1)));
        background: -webkit-linear-gradient(top, rgba(245,245,245,1) 0%, rgba(232,232,232,1) 100%);
        background: -o-linear-gradient(top, rgba(245,245,245,1) 0%, rgba(232,232,232,1) 100%);
        background: -ms-linear-gradient(top, rgba(245,245,245,1) 0%, rgba(232,232,232,1) 100%);
        background: linear-gradient(to bottom, rgba(245,245,245,1) 0%, rgba(232,232,232,1) 100%);
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f5f5f5', endColorstr='#e8e8e8', GradientType=0 );
    }
    
    .shadow6
    {
        position:relative;
        -webkit-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
           -moz-box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
                box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
    }
    .shadow6:before, .shadow6:after
    {
        content:"";
        position:absolute;
        z-index:-1;
        -webkit-box-shadow:0 0 20px rgba(0,0,0,0.8);
        -moz-box-shadow:0 0 20px rgba(0,0,0,0.8);
        box-shadow:0 0 20px rgba(0,0,0,0.8);
        top:50%;
        bottom:0;
        left:10px;
        right:10px;
        -moz-border-radius:100px / 10px;
        border-radius:100px / 10px;
    }
    .shadow6:after
    {
        right:10px;
        left:auto;
        -webkit-transform:skew(8deg) rotate(3deg);
           -moz-transform:skew(8deg) rotate(3deg);
            -ms-transform:skew(8deg) rotate(3deg);
             -o-transform:skew(8deg) rotate(3deg);
                transform:skew(8deg) rotate(3deg);
    }
    
    .padding-tb-50 {
        padding-top: 50px;
        padding-bottom: 50px;
    }
    
    .sp-large img {
        width: 300px !important;
        height: 300px !important;
    }
</style>

@php ($images = json_decode($resource->uriResources)->images)

<div class="resource-header shadow6">
    <div class="container" style="padding-top: 30px; padding-bottom: 30px">
        <div class="row">
            <div class="col-md-4 col-sm-6" style="min-height: 365px">
                <div>
                    <div class="sp-loading"><img src="{{ asset('vendor/smoothproducts/images/sp-loading.gif') }}" alt=""><br>Carregando...</div>
                    <div class="sp-wrap shadow6">
                        @if (count($images) > 0)
                            @foreach ($images as $image)
                                <a href="{{ $image }}"><img src="{{ $image }}" alt="img"></a>
                            @endforeach
                        @else
                            <img src="{{ asset('img/no-image.png') }}">
                        @endif
                        
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-6">
                <div class="row">
                    <div class="col-md-12">
                        <h1><strong>{{ $resource->name }}</strong></h1>
                        <h4 style="color: #777">{{ $resource->user->name }}</h4>
                    </div>
                    <div class="col-md-12" style="padding-top: 30px">
                        <div class="row">
                            <div class="col-md-12" style="margin-left: -11px;"><div id="rating"></div></div>
                            <div class="col-md-12">
                                <div style="color: #777">
                                    {{ $rating->total_budgets === 0 ? "Nenhuma avaliação" : $rating->total_budgets . ($rating->total_budgets === 1 ? " avaliação" : " avaliações") }}
                                </div>
                            </div>
                            <div class="col-md-12" style="padding-top: 40px; margin-left: 14px">
                                <a href="#" class="material-btn request-budget" style="width: 70%" resource-id="{{ $resource->id }}">Solicitar Orçamento</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="resource-content">
    <div class="container margin-tb-40">
        <div class="row">
              <div class="col-md-12">
                  <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#informal">Informação Livre</a></li>
                    <li><a data-toggle="tab" href="#technical">Informação Técnica</a></li>
                  </ul>
      
                  <div class="tab-content">
                    <div id="informal" class="tab-pane fade in active">
                        <div class="material-content">
                            {!! $resource->informalDescription !!}
                        </div>
                    </div>
                    <div id="technical" class="tab-pane fade">
                        <div class="material-content">
                            {!! $resource->technicalDescription !!}
                        </div>
                    </div>
                  </div>
              </div>
          </div>
    </div>
</div>

<div class="resource-content">
    <div class="container margin-tb-40">
        <h3 style="width: 100%; border-bottom: 1px solid #ccc;">Avaliações</h3>
        @if (count($comments) > 0)
            @foreach ($comments as $comment)
                <div class="row">
                    <div class="col-md-12">
                        <div class="material-content">
                            <div class="row">
                                <div class="col-sm-8">
                                    <span class="name">{{$comment->name}}</span>
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-md-12"><div class="rating" id="rating-{{$comment->id}}"></div></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12"><span class="date">{{$comment->date[2].'/'.$comment->date[1].'/'.$comment->date[0]}}</span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="material-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="message">{{$comment->message}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        @push('posscripts')
                            <script>
                                $(function () {
                                    $("#rating-{{$comment->id}}").rateYo({
                                        normalFill: "#e7e7e7",
                                        rating: {{$comment->rating}},
                                        starWidth: "20px",
                                        readOnly: true,
                                        multiColor: {
                                          "startColor": "#F44336",
                                          "endColor"  : "#4CAF50"
                                        },
                                        halfStar: true
                                    });
                                });
                            </script>
                        @endpush
                    </div>
                </div>
            @endforeach
        @else
            <div style="text-align: center">
                <h1 style="color: #7d7d7d; font-weight: bold; margin: 120px auto">Nenhuma Avaliação :(</h1>
            </div>
        @endif
    </div>
</div>

<style type="text/css">
    .name {
        font-size: 16px;
        font-weight: bold;
        color: #495F93;
    }
    
    .date {
        font-size: 12px;
        color: #495F93;
    }
    
    .message {
        color: #656565;
    }
    
    .material-body {
        margin: 11px -20px -20px -20px;
        padding: 30px 17px 14px 17px;
        background-color: #efefef;
        border-top: 1px solid #ddd;
    }
    
    .rating, .date {
        float: right;
    }
    
    .rating {
        margin-top: -10px;
        height: 20px;
    }
</style>