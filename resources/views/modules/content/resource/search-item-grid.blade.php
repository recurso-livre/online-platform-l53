<a href="{{ route('guest.resource.show', ['id' => $resource->id, 'name' => $resource->name]) }}">
    <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="material-content">
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
                <div class="col-md-12" style="text-align:center;">
                    <div class="truncate">
                        <span class="text-title">{{ $resource->name }}</span>
                    </div>
                </div>
                <div class="col-md-12" style="text-align:center;">
                        <a href="#" class="material-btn request-budget" resource-id="{{ $resource->id }}">Solicitar Orçamento</a>
                </div>
                <!--<div class="col-md-12">-->
                <!--    <div class="row">-->
                <!--        <div class="col-md-12">-->
                <!--            <span class="text-title" style="font-size: 25px">Title</span>-->
                <!--        </div>-->
                <!--    </div>-->
                    
                <!--    <div class="row">-->
                <!--        <div class="col-md-12">-->
                <!--            <button class="btn btn-success pull-right" style="margin-top: 20px">Solicitar Orçamento</button>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>
</a>