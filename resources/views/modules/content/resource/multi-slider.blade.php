<style>
    .home-item {
        color: #4d6297 !important;
        transition: 0.2s linear all;
    }
    
    .home-item:hover {
        color: #7485BB !important;
    }
</style>

<div class="margin-tb-40">
    <h4 style="width: 100%; border-bottom: 1px solid #ccc;">{{ $title }}</h4>
    <div class="jcarousel-wrapper">
        <div class="jcarousel">
            <ul>
                @foreach((object)$resources as $resource)
                    <li>
                        <a class="home-item" href="{{ route('guest.resource.show', ['id' => $resource->id, 'name' => $resource->name]) }}">
                            <div class="fluid-container">
                                <div class="row">
                                    <div class="col-md-12">
                                        
                                        <div class="image-fit" style="min-height: 160px;">
                                            @if (count($resource->uriResources->images) > 0)
                                                <img src="{{ $resource->uriResources->images[0] }}">
                                            @else
                                                <img src="{{ asset('img/no-image.png') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1"><h4><b>{{ mb_strimwidth($resource['name'], 0, 20, "...") }}</b></h4></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">{{ preg_replace('/<[^>]*>/', '', mb_strimwidth($resource['informalDescription'], 0, 70, "...")) }}</div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        
        @if(!isset($config['control']) || $config['control'])
            <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
            <a href="#" class="jcarousel-control-next">&rsaquo;</a>
        @endif
            
        @if(isset($config['pagination']) && $config['pagination'])
            <p class="jcarousel-pagination"></p>
        @endif
    </div>
</div>